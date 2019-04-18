// When the window has finished loading ...
window.addEventListener('load', () => {

  // ... attach and onClick listener to the navigation (background) to close the mobile navigation drawer.
  document.querySelector('.navigation')
    .addEventListener('click', e => document.querySelector('#nav-toggle').checked = false);

  // ... attach an onClick listener to the navigation child elements to prevent event propagation.
  // (childrens' onClick event doesn't trigger parent's onClick event)
  document.querySelectorAll('.navigation nav .links a')
    .forEach(
      node => node.addEventListener(
        'click', e => e.stopPropagation()
      )
    );
});


$('input[name="range"]').on("change mousemove", function () {
  $(this).next().html($(this).val() + '%');
});