# How to configure Google Tag Manager

## Step 1: Create new variable
- Name: `GDPR Consent level` 
- Variable type: 1st Party Cookie
- Cookie Name: `__{site_name}_cookie_consent`

***If you change your cookie name in `cookie-consent.php`, don't forget to change this one too!***

![Create new Cookie consent variable](img/step1.png?raw=true "Create new Cookie consent variable")

## Step 2: Create trigger `GDPR - Has not given consent`
- Name: `GDPR - Has not given consent`
- Trigger type: Custom Event
- Event name: .* (regex.* triggers all types of events eg pageview, clicks, user engagement… )
- Tick 'Use regex matching'
- This trigger fires on: Some Custom Event
- Fire this trigger when GDPR consent level __matches__ RegEX `^(undefined|null|0|false|NaN|none)$`
- `(^(undefined|null|0|false|NaN|none)$` = RegEx to indicate that the cookie must have a value that is equal to 0, null, undefinded, none, false…)

![Create GDPR - has not given consent variable](img/step2.png?raw=true "Create GDPR - has not given consent variable")

## Step 3: Add 'no consent' trigger as exception to every tag
Open tag > beneath the title ‘triggering’ click the plus icon next to exceptions and select the right trigger.

![Add no consent trigger](img/step-exceptions.png?raw=true "Add no consent trigger") 
_Exceptions on a trigger_

### No tags found?
It's possible that there are no tags created yet. If that's the case, create a new one (click right top 'new')
Give it the name `Google Analytics` (Or you can give this another name, but keep that in mind when you follow the next steps).
 
 For Tag Type you choose `Google Analytics: Universal Analytics`.
![Create tag](img/step3.png?raw=true "Create tag")
_Tag with some settings already set after config_

## Step 4: Create `analytic cookies` trigger
- Name: `GDPR - Consent for analytical cookies`
- Trigger type: Custom Event
- Event name: .* 
- Tick 'Use regex matching'
- This trigger fires on: Some Custom Event
- Fire this trigger when GDPR Consent Level __matches__ RegEX `analytics|all`
- (`analytics|all` = RegEx to indicate that the cookie should be analytics or all to fire the tag.)

## Step 5: Add `analytic cookies` trigger as exception to all analytic tags  
Examples of analytic cookies are: Google Analytics, Hotjar, Matomo Analytics,...

![Add analytic cookie trigger exception](img/step-exceptions.png?raw=true "Add analytic cookie trigger exception") 

## Step 6: Add `Marketing cookie` trigger
- Name: `GDPR - Consent for marketing cookies`
- Trigger type: Custom Event
- Event name: .* 
- Tick 'Use regex matching'
- This trigger fires on: Some Custom Event
- Fire this trigger when GDPR Consent level __matches__ RegEX `marketing|all`

(`marketing|all` = RegEx to indicate that the cookie should be marketing or all to fire the tag.)

## Step 7: Add `marketing cookies` trigger as exception to all marketing tags
Examples of marketing cookies are: Facebook Pixel, Google Ads conversion tags, Online pop ups/surveys, Doubleclick, ...

You do the same as you do in Step 3 and Step 5, Add exception to your trigger.

## Step 8: Add new trigger `Cookie refresh`
- Name: `Cookie refresh`
- Trigger type: Custom Event
- Event name: `cookie_refresh`
- This trigger fires on: All Custom events

![Add trigger cookie refresh](img/step8.png?raw=true "Add trigger cookie refresh")

## Step 9: Add the 'cookie refresh` trigger to the tags with `all pages`

![Add cookie refresh to all pages](img/step9.png?raw=true "Add cookie refresh to all pages")

## Step 10: Preview changes and check if the right tags get fired
Check if the righ tag get's fired eg. when your site visitor only wants analytic cookies.
## Step 11: Publish
Don't forget to publish all your changes ;-)
