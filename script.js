const eyeClick = document.querySelector("[data-password]");
const password_elem = document.getElementById("password");

eyeClick.onclick = () => {
  const icon = eyeClick.children[0];
  icon.classList.toggle("fa-eye-slash");
  if (password_elem.type === "password") {
    password_elem.type = "text";
  } else if (password_elem.type === "text") {
    password_elem.type = "password";
  }
};


/***var responsiveSlider = function() {

    var slider = document.getElementById("slider");
    var sliderWidth = slider.offsetWidth;
    var slideList = document.getElementById("slideWrap");
    var count = 1;
    var items = slideList.querySelectorAll("li").length;
    var prev = document.getElementById("prev");
    var next = document.getElementById("next");

    window.addEventListener('resize', function() {
        sliderWidth = slider.offsetWidth;
    });

    var prevSlide = function() {
        if (count > 1) {
            count = count - 2;
            slideList.style.left = "-" + count * sliderWidth + "px";
            count++;
        } else if (count = 1) {
            count = items - 1;
            slideList.style.left = "-" + count * sliderWidth + "px";
            count++;
        }
    };

    var nextSlide = function() {
        if (count < items) {
            slideList.style.left = "-" + count * sliderWidth + "px";
            count++;
        } else if (count = items) {
            slideList.style.left = "0px";
            count = 1;
        }
    };

    next.addEventListener("click", function() {
        nextSlide();
    });

    prev.addEventListener("click", function() {
        prevSlide();
    });

    setInterval(function() {
        nextSlide()
    }, 2000);

};

window.onload = function() {
    responsiveSlider();
}
*///



//************ icon loading ******************* */

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  

