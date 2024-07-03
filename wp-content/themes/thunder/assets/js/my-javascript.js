// Create a media condition that targets viewports at least 1024px wide
const mediaQuery = window.matchMedia("(min-width: 1024px)");
// Check if the media query is true
if (mediaQuery.matches) {
  // Then trigger an alert
  var imgBannerPosts = document.querySelectorAll(".banner-post .image-box-cpt img");

  if (imgBannerPosts) {
    imgBannerPosts.forEach((imgBannerPost) => {
      imgBannerPost.classList.remove("fit-cover");
    });
  }
}

// Handle Form
var navSearchIcon = document.querySelector(".nav-search .icon-search");
var navSearchForm = document.querySelector(".nav-search .form-search");
if (navSearchIcon != null && navSearchForm != null) {
  navSearchIcon.onclick = function () {
    var checkActiveForm = navSearchForm.classList.contains("active");
    if (checkActiveForm) {
      navSearchForm.classList.remove("active");
    } else {
      navSearchForm.classList.add("active");
    }
  };
}

jQuery(document).ready(function () {
  jQuery("body").on("click", ".buy_now_button", function (e) {
    e.preventDefault();
    var thisParent = jQuery(this).parents("form.cart");
    if (jQuery(".single_add_to_cart_button", thisParent).hasClass("disabled")) {
      jQuery(".single_add_to_cart_button", thisParent).trigger("click");
      return false;
    }
    thisParent.addClass("buy-now-btn");
    jQuery(".is_buy_now", thisParent).val("1");
    jQuery(".single_add_to_cart_button", thisParent).trigger("click");
  });
});

/* Woocommerce Page */
var pageWoocommerce = document.querySelector(".woocommerce-page .site-main");
var pageShopWoocommerce = document.querySelector(".woocommerce-shop.woocommerce-page .site-main");
var pageShopWoocommerce = document.querySelector(".woocommerce-shop.woocommerce-page .site-main");
var pageArchiveWoocommerce = document.querySelector(".archive.woocommerce-page .site-main");
var pageDefault = document.querySelector(".content-default");

// page shop woocommerce
if (pageShopWoocommerce) {
  pageShopWoocommerce.classList.add("site-gap-1");
}

if (pageArchiveWoocommerce) {
  pageArchiveWoocommerce.classList.add("site-gap-1");
}

if (pageWoocommerce) {
  pageWoocommerce.classList.add("site-container");
} else {
  pageDefault.classList.add("site-container");
}
