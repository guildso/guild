<script>
/*** Dark Mode Settings */

// On page load or when changing themes, best to add inline in `head` to avoid FOUC
if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
  document.documentElement.classList.add('dark')
} else {
  document.documentElement.classList.remove('dark')
}

if (window.matchMedia) {
  var match = window.matchMedia('(prefers-color-scheme: dark)')
  toggleDarkMode(match.matches);
 
  match.addEventListener('change', e => {
      toggleDarkMode(match.matches);
  })
 
  function toggleDarkMode(isDark) {
    if(isDark){
      document.documentElement.classList.add('dark')
    } else {
      document.documentElement.classList.remove('dark')
    }
  }
}

/***** End Dark Mode Settings */
</script>