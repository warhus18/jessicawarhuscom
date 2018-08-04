/**
 * Over Under jQuery Plugin
 * Version 1.0.0
 * Jan 21st, 2013
 */
!function(n){n.fn.overUnder=function(e){var i={};return i=n.extend(i,e),n(this).find("[class^='under']").each(function(){var e=n(this),i=e.attr("class").replace("under","");i==parseInt(i)&&n(window).bind("ready load resize",function(){var r=n(window).width();i>r?e.show():e.hide()})}),n(this).find("[class^='over']").each(function(){var e=n(this),i=e.attr("class").replace("over","");i==parseInt(i)&&n(window).bind("ready load resize",function(){var r=n(window).width();r>i?e.show():e.hide()})}),this}}(jQuery);

/**
 * Tel jQuery Plugin
 * Version 1
 * Dec 6th, 2012
 */
!function(n){n.fn.tel=function(r){var t={callback:function(n){alert(n)}};t=n.extend(t,r);var i={Android:function(){return navigator.userAgent.match(/Android/i)},BlackBerry:function(){return navigator.userAgent.match(/BlackBerry/i)},iOS:function(){return navigator.userAgent.match(/iPhone|iPad|iPod/i)},Opera:function(){return navigator.userAgent.match(/Opera Mini/i)},Windows:function(){return navigator.userAgent.match(/IEMobile/i)},any:function(){return i.Android()||i.BlackBerry()||i.iOS()||i.Opera()||i.Windows()}},a=n(this);return a.is("a")||(a=a.find("a")),a.each(function(){var r=n(this),a=r.attr("href");"tel:"!=a.substring(0,4)||i.any()||r.click(function(){return t.callback(a.replace("tel:","")),!1})}),this}}(jQuery);