// source --> https://novenylife.com/wp-content/themes/shoppingcart/js/yith-wcwl-custom.js?ver=1 
jQuery(document).ready(function(t){t("body").on("added_to_wishlist removed_from_wishlist",function(){t.ajax({beforeSend:function(){},complete:function(){},data:{action:"update_wishlist_count"},success:function(n){t(".wishlist-box span.wl-counter").html(n)},url:yith_wcwl_l10n.ajax_url})})});