<?php

namespace App\Http\Livewire;
use App\Models\Notification;
use App\Events\NotificationSent;
use App\Models\Task;
use Livewire\Component;
use Livewire\Event;

class Tasks extends Component
{
    public $name, $description, $status, $task_id;
    public $updateMode = false;
    public $numResults = 10;
    public $sortField = 'created_at';
    public $sortAsc = false;
    public $taskStatus = ['To Do', 'Completed', 'In Progress'];
    public $search = '';

    protected $rules = [
        'name' => 'required|min:6',
        'description' => 'required',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        $tasks = Task::query()
                        ->where('name', 'like', '%'.$this->search.'%')
                        ->where('team_id', auth()->user()->currentTeam->id)
                        ->whereIn('status', $this->taskStatus )
                        ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                        ->paginate($this->numResults);
        return view('livewire.tasks', compact('tasks'));
    }

    public function loadMore(){
        $this->numResults += 10;
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = ! $this->sortAsc;
        } else {
            $this->sortAsc = true;
        }
        $this->sortField = $field;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->name = '';
        $this->description = '';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        if (auth()->user()->hasTeamPermission(auth()->user()->currentTeam, 'create')) {
            $this->validate();
            $task = new Task;
            $task->team_id = auth()->user()->currentTeam->id;
            $task->name = $this->name;
            $task->description = $this->description;
            $task->save();

            $this->dispatchBrowserEvent('notification', ['type' => 'success', 'message' => 'Task Created Successfully!']);

            $this->resetInputFields();

            event(new NotificationSent(new Notification, ['title' => 'New Task Added', 'description' => $task->name]));
        } else {
            $this->dispatchBrowserEvent('notification', ['type' => 'error', 'message' => 'You do not have permissions to add tasks to this team!']);
        }
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        if (auth()->user()->hasTeamPermission(auth()->user()->currentTeam, 'update')) {
            $task = Task::findOrFail($id);
            $this->task_id = $id;
            $this->name = $task->name;
            $this->description = $task->description;

            $this->updateMode = true;

        } else {
            $this->dispatchBrowserEvent('notification', ['type' => 'error', 'message' => 'You do not have permissions to edit tasks!']);
        }

    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function update()
    {
        if (auth()->user()->hasTeamPermission(auth()->user()->currentTeam, 'update')) {
            $validatedDate = $this->validate([
                'name' => 'required',
                'description' => 'required',
            ]);

            $task = Task::find($this->task_id);
            $task->update([
                'name' => $this->name,
                'description' => $this->description,
            ]);

            $this->updateMode = false;

            $this->resetInputFields();
            $this->dispatchBrowserEvent('notification', ['type' => 'success', 'message' => 'Task Updated Successfully!']);
        } else {
            $this->dispatchBrowserEvent('notification', ['type' => 'error', 'message' => 'You do not have permissions to edit tasks!']);
        }
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        if (auth()->user()->hasTeamPermission(auth()->user()->currentTeam, 'delete')) {
            $task = Task::find($id);
            $task->delete();
            $this->dispatchBrowserEvent('notification', ['type' => 'warning', 'message' => 'You have deleted the task!']);

            event(new NotificationSent(new Notification, ['title' => 'Task Deleted', 'description' => $task->name]));
        } else {
            $this->dispatchBrowserEvent('notification', ['type' => 'error', 'message' => 'You do not have permissions to delete tasks!']);
        }
    }

    public function assign($id)
    {
        $task = Task::find($id);
        if (!$task->user_id) {
            $task->user_id = auth()->user()->id;
            $this->dispatchBrowserEvent('notification', ['type' => 'success', 'message' => 'You have assigned the task to yourself!']);

            event(new NotificationSent(new Notification, ['title' => 'Assigned task', 'description' => $task->name]));
        } elseif($task->user_id != auth()->user()->id) {
            $task->user_id = auth()->user()->id;
            $this->dispatchBrowserEvent('notification', ['type' => 'success', 'message' => 'You have assigned the task to yourself!']);

            event(new NotificationSent(new Notification, ['title' => 'Assigned task', 'description' => $task->name]));
        } else {
            $task->user_id = NULL;
            $this->dispatchBrowserEvent('notification', ['type' => 'notice', 'message' => 'You have unassigned the task!']);

            event(new NotificationSent(new Notification, ['title' => 'Unassigned task', 'description' => $task->name]));
        }
        $task->save();
    }

    public function inProgressTask($id)
    {
        if (auth()->user()->hasTeamPermission(auth()->user()->currentTeam, 'read')) {
            Task::find($id)->update(['status' => 'In Progress']);
            $this->dispatchBrowserEvent('notification', ['type' => 'success', 'message' => 'The task is now in progress!']);

            event(new NotificationSent(new Notification, ['title' => 'Task status changed', 'description' => 'The task is now In Progress']));
        }
    }

    public function completeTask($id)
    {
        if (auth()->user()->hasTeamPermission(auth()->user()->currentTeam, 'read')) {
            Task::find($id)->update(['status' => 'Completed']);
            $this->dispatchBrowserEvent('notification', ['type' => 'success', 'message' => 'The task is now in progress!']);

            event(new NotificationSent(new Notification, ['title' => 'Task status changed', 'description' => 'The task is now Completed']));
        }
    }

}
