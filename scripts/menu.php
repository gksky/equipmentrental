<div class="navigation-wrapper">
    <div class="navigation-button">
        <i class="fa fa-bars"></i>
    </div>
    <div class="navigation-menu">
        <ul>
            <li><a href="https://арендаспецтехники.бел/аренда_подъемника">подъемники</a></li>
            <li><a href="https://арендаспецтехники.бел/аренда_мачтового_подъемника">мачтовые</a></li>
            <li><a href="https://арендаспецтехники.бел/аренда_экскаватора">экскаваторы</a></li>
            <li><a href="https://арендаспецтехники.бел/аренда_погрузчика">погрузчики</a></li>
            <li><a href="https://арендаспецтехники.бел/аренда_автокрана">автокраны</a></li>
        	  <li><a href="https://арендаспецтехники.бел/аренда_бульдозера">бульдозеры</a></li>
            <li><a href="https://арендаспецтехники.бел/аренда_виброкатка">виброкатки</a></li>
            <li><a href="https://арендаспецтехники.бел/аренда_самосвала">самосвалы</a></li>
            <li><a href="https://арендаспецтехники.бел/перевозка_спецтехники">перевозка</a></li>
            <li><a href="">откачка</a></li>
        </ul>
    </div>
</div>
<script>
    var navButton = document.querySelector('.navigation-button');
var navMenu = document.querySelector('.navigation-menu');
var win = window;

function openMenu(event) {
  
  navButton.classList.toggle('active');
  navMenu.classList.toggle('active');

  event.preventDefault();
  event.stopImmediatePropagation();
}
  
function closeMenu(event) {
  if (navButton.classList.contains('active')) {
    navButton.classList.remove('active');
    navMenu.classList.remove('active');
  }
}
  navButton.addEventListener('click', openMenu, false);

win.addEventListener('click',closeMenu, false);
</script>