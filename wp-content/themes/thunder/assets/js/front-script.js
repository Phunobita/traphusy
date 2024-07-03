// ========>> START - SLIDE BANNER
var slideIndex = 1;
showSlides(slideIndex);

function showSlides(n) {
  var i;
  slides = document.getElementsByClassName("banner-item");
  if (slides.length == 0) return;
  if (n > slides.length) {
    slideIndex = 1;
  }
  if (n < 1) {
    slideIndex = slides.length;
  }

  for (i = 0; i < slides.length; i++) {
    slides[i].classList.remove("active");
  }

  slides[slideIndex - 1].classList.add("active");
}

function plusSlides(n) {
  showSlides((slideIndex += n));
}

// ===> Start auto slide banner
let index = 0;
displayImages();
function displayImages() {
  let i;
  const images = document.getElementsByClassName("banner-auto-item");
  for (i = 0; i < images.length; i++) {
    images[i].style.display = "none";
  }
  index++;
  if (index > images.length) {
    index = 1;
  }
  images[index - 1].style.display = "block";
  setTimeout(displayImages, 4000);
}
// ===> End auto slider banner

// ========>> END - SLIDE BANNER

// ========>> START - SLIDE THUMB

document.addEventListener("DOMContentLoaded", slideStart);

function slideStart() {
  const slides = document.querySelectorAll(".slide");

  if (!slides) return;

  for (let index = 0; index < slides.length; index++) {
    const slide = slides[index];
    const slideInfo = getSlideInfo(slide);
    if (!slideInfo) return;
    let slideValue = getSlideValue(slideInfo);
    let maxSlideStep = slideValue.maxSlideStep;

    const slideNext = slideInfo.slideNext;
    const slidePrev = slideInfo.slidePrev;
    const slideDots = slideInfo.slideDots;
    const slideDotsItemChild = createDotItems(slideDots, maxSlideStep);

    let currentSlideIndex = 0;

    if (slideNext) {
      slideNext.addEventListener("click", function () {
        currentSlideIndex = getCurrentIndex("next", currentSlideIndex, maxSlideStep);
        moveSlide(slideInfo, slideValue, currentSlideIndex);
        updateDotClassActive(slideDotsItemChild, currentSlideIndex);
      });
    }
    if (slidePrev) {
      slidePrev.addEventListener("click", function () {
        currentSlideIndex = getCurrentIndex("prev", currentSlideIndex, maxSlideStep);
        moveSlide(slideInfo, slideValue, currentSlideIndex);
        updateDotClassActive(slideDotsItemChild, currentSlideIndex);
      });
    }
    if (slideDotsItemChild) {
      for (let i = 0; i < slideDotsItemChild.length; i++) {
        const slideDotItem = slideDotsItemChild[i];
        const slideDotIndex = i;
        slideDotItem.addEventListener("click", function () {
          currentSlideIndex = slideDotIndex;
          moveSlide(slideInfo, slideValue, currentSlideIndex);
          updateDotClassActive(slideDotsItemChild, currentSlideIndex);
        });
      }
    }

    // WINDOW RESIZED
    window.addEventListener("resize", getWindowResized);
    let windowResized;
    function getWindowResized() {
      clearTimeout(windowResized);
      windowResized = setTimeout(function () {
        const currentSlideIndexOld = currentSlideIndex;
        const slideNumberDisplayOld = slideValue.slideNumberDisplay;

        slideValue = getSlideValue(slideInfo);
        maxSlideStep = slideValue.maxSlideStep;
        const slideNumberDisplayNEW = slideValue.slideNumberDisplay;
        const slideDotsItemChild = createDotItems(slideDots, maxSlideStep);

        if (currentSlideIndex > 0) {
          currentSlideIndex = currentSlideIndexOld + slideNumberDisplayOld - slideNumberDisplayNEW;
        }
        if (currentSlideIndex < 0) {
          currentSlideIndex = 0;
        }

        moveSlide(slideInfo, slideValue, currentSlideIndex);
        updateDotClassActive(slideDotsItemChild, currentSlideIndex);

        if (slideDotsItemChild) {
          for (let i = 0; i < slideDotsItemChild.length; i++) {
            const slideDotItem = slideDotsItemChild[i];
            const slideDotIndex = i;
            slideDotItem.addEventListener("click", function () {
              currentSlideIndex = slideDotIndex;
              moveSlide(slideInfo, slideValue, currentSlideIndex);
              updateDotClassActive(slideDotsItemChild, currentSlideIndex);
            });
          }
        }
      }, 100);
    }
  }
}

function getSlideInfo(slide) {
  if (!slide.querySelector(".slide-list")) return;
  if (!slide.querySelector(".slide-container")) return;
  return {
    slideContainer: slide.querySelector(".slide-container"),
    slideList: slide.querySelector(".slide-list"),
    slideItems: slide.querySelector(".slide-list") !== null ? slide.querySelector(".slide-list").children : 0,
    slideItemTotal: slide.querySelector(".slide-list").children.length,
    slideNext: slide.querySelector(".slide-arrow.next"),
    slidePrev: slide.querySelector(".slide-arrow.prev"),
    slideDots: slide.querySelector(".slide-dots"),
  };
}

function getSlideValue(slideInfo) {
  const slideContainerWidth = getComputedStyle(slideInfo.slideContainer).width.replace(/px/, "") * 1;
  const slideItemsWidth = getComputedStyle(slideInfo.slideItems[0]).width.replace(/px/, "") * 1;
  const slideColumnGap = getComputedStyle(slideInfo.slideList).gap.replace(/px/, "") * 1;

  const slideNumberDisplay = +((slideContainerWidth + slideColumnGap) / (slideItemsWidth + slideColumnGap)).toFixed(2);
  const slideItemsGapWidth = slideItemsWidth + slideColumnGap;
  const maxSlideStep = slideInfo.slideItemTotal - slideNumberDisplay;

  return {
    slideContainerWidth: slideContainerWidth,
    slideItemsWidth: slideItemsWidth,
    slideColumnGap: slideColumnGap,
    slideNumberDisplay: slideNumberDisplay,
    slideItemsGapWidth: slideItemsGapWidth,
    maxSlideStep: maxSlideStep >= 0 ? maxSlideStep : 0,
  };
}

function getCurrentIndex(slideNav, currentSlideIndex, maxSlideStep) {
  if (slideNav == "next") {
    if (currentSlideIndex >= maxSlideStep) {
      return currentSlideIndex;
    }
    currentSlideIndex++;
  }
  if (slideNav == "prev") {
    if (currentSlideIndex <= 0) {
      return currentSlideIndex;
    }
    currentSlideIndex--;
  }

  return currentSlideIndex;
}

function moveSlide(slideInfo, slideValue, currentSlideIndex) {
  const slideItemsGapWidth = slideValue.slideItemsGapWidth;
  const slideList = slideInfo.slideList;
  const slideTransFormWidth = slideItemsGapWidth * currentSlideIndex;

  slideList.style.transform = "translateX(-" + slideTransFormWidth + "px)";
}

function createDotItems(slideDots, maxSlideStep) {
  if (!slideDots) return;
  let dotItem = "";
  if (Math.round(maxSlideStep) <= 0) {
    dotItem = "";
  } else {
    for (let index = 0; index <= Math.round(maxSlideStep); index++) {
      if (index == 0) {
        dotItem += '<span class="dot active"></span>';
      } else {
        dotItem += '<span class="dot"></span>';
      }
    }
  }
  slideDots.innerHTML = dotItem;
  return slideDots.children;
}

function updateDotClassActive(slideDotsItemChild, currentSlideIndex) {
  if (!slideDotsItemChild || slideDotsItemChild.length == 0) return;
  for (let i = 0; i < slideDotsItemChild.length; i++) {
    slideDotsItemChild[i].classList.remove("active");
  }
  slideDotsItemChild[Math.round(currentSlideIndex)].classList.add("active");
}

// ========>> END - SLIDE THUMB

// ====> START SLIDER POSTS AUTO

const cardWrapper = document.querySelector(".list-posts-auto");
const contentPosts = document.querySelector(".content-posts-auto");
const cardWrapperChildren = Array.from(cardWrapper.children);
const widthToScroll = cardWrapper.children[0].offsetWidth;
const arrowPrev = document.querySelector(".slide-auto-arrow.prev");
const arrowNext = document.querySelector(".slide-auto-arrow.next");
const cardBounding = cardWrapper.getBoundingClientRect();
const column = Math.floor(cardWrapper.offsetWidth / widthToScroll);

let currScroll = 0;
let initPos = 0;
let clicked = false;

cardWrapperChildren
  .slice(-column)
  .reverse()
  .forEach((item) => {
    cardWrapper.insertAdjacentHTML("afterbegin", item.outerHTML);
  });

cardWrapperChildren.slice(0, column).forEach((item) => {
  cardWrapper.insertAdjacentHTML("beforeend", item.outerHTML);
});

cardWrapper.classList.add("no-smooth");
cardWrapper.scrollLeft = cardWrapper.offsetWidth;
cardWrapper.classList.remove("no-smooth");

arrowPrev.onclick = function () {
  cardWrapper.scrollLeft -= widthToScroll;
};

arrowNext.onclick = function () {
  cardWrapper.scrollLeft += widthToScroll;
};

cardWrapper.onmousedown = function (e) {
  cardWrapper.classList.add("grab");
  initPos = e.clientX - cardBounding.left;
  currScroll = cardWrapper.scrollLeft;
  clicked = true;
};

cardWrapper.onmousemove = function (e) {
  if (clicked) {
    const xPos = e.clientX - cardBounding.left;
    cardWrapper.scrollLeft = currScroll + -(xPos - initPos);
  }
};

cardWrapper.onmouseup = mouseUpAndLeave;
cardWrapper.onmouseleave = mouseUpAndLeave;

function mouseUpAndLeave() {
  cardWrapper.classList.remove("grab");
  clicked = false;
}

let autoScroll;

cardWrapper.onscroll = function () {
  if (cardWrapper.scrollLeft === 0) {
    cardWrapper.classList.add("no-smooth");
    cardWrapper.scrollLeft = cardWrapper.scrollWidth - 2 * cardWrapper.offsetWidth;
    cardWrapper.classList.remove("no-smooth");
  } else if (cardWrapper.scrollLeft === cardWrapper.scrollWidth - cardWrapper.offsetWidth) {
    cardWrapper.classList.add("no-smooth");
    cardWrapper.scrollLeft = cardWrapper.offsetWidth;
    cardWrapper.classList.remove("no-smooth");
  }

  if (autoScroll) {
    clearTimeout(autoScroll);
  }

  autoScroll = setTimeout(() => {
    cardWrapper.classList.remove("no-smooth");
    cardWrapper.scrollLeft += widthToScroll;
  }, 4000);
};

// ====> END SLIDER POSTS AUTO

// ========>> START - TAB

document.addEventListener("DOMContentLoaded", tabStart);

function tabStart() {
  const tabLayouts = document.querySelectorAll(".tab-layout");

  if (tabLayouts) {
    for (let i = 0; i < tabLayouts.length; i++) {
      const tabLayout = tabLayouts[i];
      const tabLinks = tabLayout.querySelectorAll(".tab-link");
      const tabContent = tabLayout.querySelectorAll(".tab-content");

      if (tabLinks && tabContent) {
        for (let i = 0; i < tabLinks.length; i++) {
          const tabLink = tabLinks[i];

          tabLink.addEventListener("click", function () {
            const tabContentID = tabLink.dataset.id;

            for (let i = 0; i < tabLinks.length; i++) {
              tabLinks[i].classList.remove("active");
            }

            for (let i = 0; i < tabContent.length; i++) {
              tabContent[i].id == tabContentID ? tabContent[i].classList.add("active") : tabContent[i].classList.remove("active");
            }

            tabLink.classList.add("active");
          });
        }
      }
    }
  }
}

// ========>> END - TAB
// ========>> START - TOGGLE MENU

function myFunction() {
  var menuPrimary = document.querySelector(".menu-primary");
  menuPrimary.classList.toggle("js-show");
}

// ========>> END - TOGGLE MENU
// ========>> START - AJAX

document.addEventListener("DOMContentLoaded", paginationStart);

function paginationStart() {
  const pagiBox = document.querySelectorAll(".pagination");
  const url = wpt_objects_ajax.ajax_url;
  const action = "send_page_data";

  if (!pagiBox) return;

  for (let index = 0; index < pagiBox.length; index++) {
    const pagiContent = pagiBox[index].querySelector(".pagination-content");
    const pagiNav = pagiBox[index].querySelector(".pagination-nav");

    if (!pagiNav) {
      continue;
    }

    pagiNav.addEventListener("click", function (e) {
      e.preventDefault();
      if (e.target && e.target.classList.contains("page-numbers")) {
        const pagiNumber = e.target;

        if (pagiNumber.classList.contains("current")) return;

        const pagedNumber = !pagiNumber.getAttribute("href").match(/\d+/) ? 1 : pagiNumber.getAttribute("href").match(/\d+/)[0];
        const base = pagiNumber.getAttribute("href").split("page")[0];
        const nonceValidate = wpt_objects_ajax.wpt_nonce;

        const data = new FormData();

        if (pagiContent) {
          const pagiType = pagiContent.dataset.type;
          const pagiTax = pagiContent.dataset.tax;
          const pagiTerm = pagiContent.dataset.term;

          data.append("post_type", pagiType);
          data.append("taxonomy", pagiTax);
          data.append("term_id", pagiTerm);
        }

        data.append("nonce", nonceValidate);
        data.append("action", action);
        data.append("pagedNumber", pagedNumber);
        data.append("base", base);

        fetch(url, {
          method: "POST",
          credentials: "same-origin",
          body: data,
        })
          .then((response) => response.json())
          .then((jsonResponse) => {
            pagiContent.innerHTML = jsonResponse.data.posts;
            pagiNav.innerHTML = jsonResponse.data.pagination;
            pagiContent.scrollIntoView();
          });
      }
    });
  }
}

document.addEventListener("DOMContentLoaded", getFormStart);

function getFormStart() {
  const contactForms = document.querySelectorAll(".form");
  const url = wpt_objects_ajax.ajax_url;
  const action = "send_contact_form_data";

  if (!contactForms) return;

  for (let index = 0; index < contactForms.length; index++) {
    const contactForm = contactForms[index];
    const btnSubmit = contactForm.querySelector(".submit");
    let messageBox = contactForm.querySelector("#message-box");

    if (!btnSubmit) {
      continue;
    }

    btnSubmit.addEventListener("click", function (e) {
      e.preventDefault();

      messageBox.innerHTML = "Processing...!";
      messageBox.scrollIntoView();

      const data = new FormData();

      const inputTermId = contactForm.querySelector('input[name="term_id"]').value;
      const inputCustomerName = contactForm.querySelector('input[name="customer_name"]').value;
      const inputCustomerPhone = contactForm.querySelector('input[name="customer_phone"]').value;
      const inputCustomerSubject = contactForm.querySelector('input[name="customer_subject"]').value;
      const inputCustomerMess = contactForm.querySelector('textarea[name="customer_mess"]').value;
      const inputCustomerAttachment = contactForm.querySelector('input[name="customer_attachment"]');
      const fileData = inputCustomerAttachment.files[0];

      const nonceValidate = wpt_objects_ajax.wpt_nonce;

      data.append("file_data", fileData);
      data.append("term_id", inputTermId);
      data.append("customer_name", inputCustomerName);
      data.append("customer_phone", inputCustomerPhone);
      data.append("customer_subject", inputCustomerSubject);
      data.append("customer_mess", inputCustomerMess);

      data.append("nonce", nonceValidate);
      data.append("action", action);

      fetch(url, {
        method: "POST",
        credentials: "same-origin",
        body: data,
      })
        .then((response) => response.json())
        .then((jsonResponse) => {
          const status = jsonResponse.data.status;
          const message = jsonResponse.data.message;
          const classItem = status === 1 ? "item success" : "item error";

          messageBox.innerHTML = "";
          message.forEach((element) => {
            messageBox.innerHTML += '<li class="' + classItem + '">' + element + " </li>";
          });

          messageBox.scrollIntoView();
          if (status === 1) {
            contactForm.reset();
          }
        });
    });
  }
}

// ========>> END - AJAX
// ========>> START - COUNTERS
document.addEventListener("DOMContentLoaded", counterStart);
function counterStart() {
  const counters = document.querySelectorAll(".counter-number");
  counters.forEach((counter) => {
    counter.innerText = 0;
    const updateCount = () => {
      const target = parseInt(counter.getAttribute("data-target"));
      const count = parseInt(counter.innerText);
      if (count < target) {
        counter.innerText = count + 1;
        setTimeout(updateCount, 15);
      } else {
        counter.innerText = "+" + target;
      }
    };
    updateCount();
  });
}

// ========>> END - COUNTERS
