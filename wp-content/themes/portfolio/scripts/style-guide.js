/*
 * Vertex | Style Guide
 *
 * Style Guide Specific jQuery Functions and Custom JS
 *
 ********************************************************************************/


/*
 * global variables
 *
 ************************************************************/

 const vkNavContainer = jQuery('[data-vk-nav=container]');
 const vkCollapsedClass = 'is-collapsed';
 const vkExpandedClass = 'is-expanded';
 const vkSecondaryNavClass = 'vk-nav__nav-container--secondary';


/*
 * custom functions and event handlers
 *
 ************************************************************/

function vkInitTimestamp() {
    // get last modified date for Document Content
    var x = document.lastModified,
        res = x.split(" ");

    // assign date
    jQuery('[data-date=lastmodified]').text(res[0]);
}


/*
 * functions for management of navigation
 *
 ****************************************/

// collapse any expanded subnavs within the navigation
function vkResetNavigation() {
    jQuery('[data-vk-nav=container]').find('.' + vkExpandedClass).each(function() {
        jQuery(this).removeClass(vkExpandedClass);
        jQuery(this).children('.vk-nav__nav-container').hide();
    });
}

function vkInitPrimaryNav() {
    const activeNav = jQuery('.is-active').closest('[data-vk-subnav=panel]');

    if (activeNav) {
        activeNav.parent().addClass('is-expanded');
        activeNav.show();
    }
}


/*
 * jQuery load
 *
 ************************************************************/

jQuery(window).on('load', function() {
    // insert_load_actions
});


// define and apply syntax highlighting to specific regions
jQuery(window).bind('create.xrayhtml', function() {

    jQuery('.source-panel').find('code').addClass('language-markup');

    Prism.highlightAll();
});


/*
 * jQuery resize
 *
 ************************************************************/

jQuery(window).on('resize', function() {
    // insert_resize_actions
}).resize();


/*
 * jQuery document ready
 *
 ************************************************************/

jQuery(document).ready(function() {

    vkInitTimestamp();
    vkInitPrimaryNav();

    // show and hide full navigation
    jQuery('[data-vk-nav=toggle]').on('click', () => {
        jQuery('body').toggleClass('is-hidden');
    });

    jQuery('[data-vk-subnav=toggle]').on('click', (e) => {
        const activeSection = jQuery(e.currentTarget).parent();
        const subnavPanel = jQuery(e.currentTarget).next();
        const subnavPanelList = subnavPanel.find('.vk-nav__list');
        const isCollapsed = vkNavContainer.is('.is-collapsed') && subnavPanel.hasClass(vkSecondaryNavClass);
        const collapseList = isCollapsed ? subnavPanelList : subnavPanel;

        // if the navigation is collapsed and we're not clicking a tertiary nav,
        // then reset the navigation
        // this avoids overlapping secondary navigation panels
        if (vkNavContainer.hasClass(vkCollapsedClass) && !subnavPanel.hasClass(tertiaryNavClass)) {
            vkResetNavigation();
        }

        activeSection.siblings().find('.vk-nav__list').removeAttr('style');

        // toggle navigation panels
        if (activeSection.hasClass(vkExpandedClass)) {
            activeSection.removeClass(vkExpandedClass);
            collapseList.slideUp('500');

            // contract any expanded children menus
            subnavPanel.find('.' + vkExpandedClass).each(function() {
                jQuery(this).removeClass(vkExpandedClass);
                jQuery(this).children('.vk-nav__nav-container').slideUp('500');
            });
        } else {
            activeSection.addClass(vkExpandedClass);
            collapseList.slideDown('500');
        }
    });

    // make sure no secondary navigations are stuck on screen when leaving navigation panels
    // this also avoids overlapping secondary navigation panels
    jQuery('body').on('mouseleave', '.is-collapsed .vk-nav__nav-container--primary > .vk-nav__list > .vk-nav__item.is-expanded', () => {
        vkNavContainer.find('.' + vkExpandedClass).removeClass(vkExpandedClass);
        setTimeout(() => {
            jQuery('.vk-nav__list, .vk-nav__nav-container').removeAttr('style');
            vkResetNavigation();
        }, 300);
    });

    // make full table row clickable
    jQuery('.tabular-data__container tbody tr').click(function() {
        var href = jQuery(this).find('a').attr('href');
        if (href) {
            window.location = href;
        }
    });
});
