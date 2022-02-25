<script>
/*** Dark Mode Settings */

let appearance = localStorage.getItem('appearance');
console.log(appearance);

let match = window.matchMedia('(prefers-color-scheme: dark)');

if(appearance == '"dark"'){
  document.documentElement.classList.add('dark')
} else if(appearance == '"light"'){
  document.documentElement.classList.remove('dark')
} else {
  if(match.matches && localStorage.getItem('appearance') == '"auto"'){
    document.documentElement.classList.add('dark')
  } else {
    document.documentElement.classList.remove('dark')
  }
}
  
 
  match.addEventListener('change', e => {
      if(match.matches){
        document.documentElement.classList.add('dark')
      } else {
        document.documentElement.classList.remove('dark')
      }
  })

/***** End Dark Mode Settings */
</script>