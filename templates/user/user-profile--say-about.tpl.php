<?php
/**
 * @file
 * Default theme implementation to present all user profile data.
 *
 * This template is used when viewing a registered member's profile page,
 * e.g., example.com/user/123. 123 being the users ID.
 *
 * Use render($user_profile) to print all profile items, or print a subset
 * such as render($user_profile['user_picture']). Always call
 * render($user_profile) at the end in order to print all remaining items. If
 * the item is a category, it will contain all its profile items. By default,
 * $user_profile['summary'] is provided, which contains data on the user's
 * history. Other data can be included by modules. $user_profile['user_picture']
 * is available for showing the account picture.
 *
 * Available variables:
 *   - $user_profile: An array of profile items. Use render() to print them.
 *   - Field variables: for each field instance attached to the user a
 *     corresponding variable is defined; e.g., $account->field_example has a
 *     variable $field_example defined. When needing to access a field's raw
 *     values, developers/themers are strongly encouraged to use these
 *     variables. Otherwise they will have to explicitly specify the desired
 *     field language, e.g. $account->field_example['en'], thus overriding any
 *     language negotiation rule that was previously applied.
 *
 * @see user-profile-category.tpl.php
 *   Where the html is handled for the group.
 * @see user-profile-item.tpl.php
 *   Where the html is handled for each item in the group.
 * @see template_preprocess_user_profile()
 *
 * @ingroup themeable
 */
?>
<div class="profile"<?php print $attributes; ?>>
    <div class="tmnItem clearfix">
        <?php if($user_load->picture && isset($user_load->picture)){ ?>
        <div class="tmnAvatar">
            <img src="<?php print file_create_url($user_load->picture->uri) ?>" />
        </div>
        <?php } ?>
        <div class="tmnContent">
            <div class="tmnContentInner">
                <div class="tmnHead">
                    <?php if($user_load->field_fullname_user && isset($user_load->field_fullname_user[LANGUAGE_NONE])){ ?>
                    <h4><?php print $user_load->field_fullname_user[LANGUAGE_NONE][0]['value'] ?></h4>
                    <?php } ?>
                    <?php if($user_load->field_job_user && isset($user_load->field_job_user[LANGUAGE_NONE])){ ?>
                    <p class="subname"><?php print $user_load->field_job_user[LANGUAGE_NONE][0]['value']; ?></p>
                    <?php } ?>
                    <?php if($user_load->field_website_user && isset($user_load->field_website_user)){ ?>
                    <p class="link"><i class="fa fa-globe"></i>
                        <a href="<?php print $user_load->field_website_user[LANGUAGE_NONE][0]['value'] ?>" title="<?php print $user_load->field_website_user[LANGUAGE_NONE][0]['value'] ?>"><?php print $user_load->field_website_user[LANGUAGE_NONE][0]['value'] ?></a>
                    </p>
                    <?php } ?>
                </div>
                <?php if($user_load->field_introduction_user & isset($user_load->field_introduction_user)){ ?>
                <div class="tmnBody">
                 <?php print $user_load->field_introduction_user[LANGUAGE_NONE][0]['value'] ?>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
