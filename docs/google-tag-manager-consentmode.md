# How to configure Google Tag Manager for new Consent Mode v2

## Step 1: Install tag and variable template from GTM Template Gallery
- Tag template: gtm-templates-simo-ahava
- Variable template:  GTM Consent State by Ayudante

## Step 2: Create variable for Cookie consent status
- Go to variables
- Create new user defined variable
- Name: Cookie consent status
- Type: 1st Party Cookie
- Cookie name: __{site_name}_cookie_consent
- URI-decode cookie: true
- Format Value: "Convert undefined to denied"

Remember to change the cookie name if you have changed this inside the config.

![Create new Cookie consent status variable](img/v2_step2.png?raw=true "Create new Cookie consent status variable")

## Step 3: Add variable for analytical consent
- Go to variables
- Create new user defined variable
- Name: JS - Consent status, analytics
- Type: Custom JavaScript
- Script: 

            function() {
                var cAnalysis = {{Cookie consent status}};
                if(cAnalysis == 'all' || cAnalysis == 'analytics'){
                    return 'granted'
                }else{
                    return 'denied';
                }
            } 

Be aware that the {{Cookie consent status}} variable must match the variable name given in step 2. Remember to change the "all" and "analytics" variable if you have changed this in the config file.

![Create new Cookie consent status variable](img/v2_step3.png?raw=true "Create new Cookie consent status variable")

## Step 4: Add variable for advertising consent
- Go to variables
- Create new user defined variable
- Name: JS - Consent status, advertising
- Type: Custom JavaScript
- Script: 

            function() {
                var cAdvertising = {{Cookie consent status}};
                if(cAdvertising == 'all' || cAdvertising == 'marketing'){
                    return 'granted'
                }else{
                    return 'denied';
                }
            } 

Be aware that the {{Cookie consent status}} variable must match the variable name given in step 2. Remember to change the "all" and "marketing" variable if you have changed this in the config file.

![Create new Cookie consent status variable](img/v2_step5.png?raw=true "Create new Cookie consent status variable")

## Step 5: Create consent mode init tag
- Go to tags
- Create new tag
- Tag name: Consent mode - initialization
- Tag type: Consent Mode (Google tags) - refers to installed template: gtm-templates-simo-ahava

See below image for cofiguration values.
![Init tag configuration](img/v2_step5.png?raw=true "Create new Cookie consent status variable")

## Step 6: Create Cookie refresh trigger
- Go to triggers
- Only create if it does not exist
- Name: Cookie refresh
- Type: Custom Event
- Event name: cookie_refresh
- Fire on all custom events

![Cookie refresh configuration](img/v2_step6.png?raw=true "Cookie refresh configuration")

## Step 7: Create consent mode update tag
- Go to tags
- Create new tag
- Name: Consent mode - update
- Tag type: Consent Mode (Google tags) - refers to installed template: gtm-templates-simo-ahava

See below image for configuration values.
![Update tag configuration](img/v2_step7.png?raw=true "Create new Cookie consent init tag")

## Step 8: Create consent update trigger
- Go to triggers
- Only create if it does not exist
- Name: Consent update
- Type: Custom event
- Event name: gtm_consent_update
- Fire on all custom events
![Create trigger](img/v2_step8.png?raw=true "Create trigger")

## Step 9: Add trigger to all "All pages"-tags
- Go to tags
- Check all tags with firing triggers including "All pages" (not including Consent initialization - All pages)
- Click the "Edit triggers"-icon in the top right corner of the table
- Add new firing trigger by using the plus icon on the top right
- Choose the "Consent update"-trigger
- Save

![Assign trigger](img/v2_step9.png?raw=true "Assign trigger")

## Step 10: Preview changes and check if the right tags get fired
Check if the righ tag get's fired eg. when your site visitor only wants analytic cookies.
## Step 11: Publish
Don't forget to publish all your changes ;-)
