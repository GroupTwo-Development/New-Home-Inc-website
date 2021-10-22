jQuery(document).ready(function ($) {
	$("#wp-version-message").after("<p class='dpv-wrapper'><span class='dpv-php'>Server running PHP version: <b style='color:green;'>" + dpvObj.phpversion + "</b>.</span><span style='display:none;' class='dpv-mysql'> MySQL version: <b style='color:green';>" + dpvObj.mysqlversion + "</b></span></p>");
  
  $(".dpv-wrapper").hover( function() {
      $( ".dpv-mysql" ).css( "display", "inline" );
    }, function() {
      $( ".dpv-mysql" ).css( "display", "none" );
    }
  );
});