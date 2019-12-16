# Swiss Army Tools (External Module)

## End-user documentation (REDCap Admins, please click the [local link](?prefix=swiss_army&page=adminReadme.md) or [GitHub link](https://github.com/alanisem123/redcap_swiss_army_tools/blob/master/adminReadme.md))

The Swiss Army Tool is a framework (provided in form of an External Module) that allows managing custom made action tags, smart variables,
hooks, and plugins from the Control Center. It was developed for the REDCap Spanish Group's Hackathon of 12'19 with the sole purpose of enabling collaboration among the group
and provide any and all resulting products back to the REDCap Consortium.

<b>Notice:</b> the work outlined here is covered by the MIT license. Please look for its definition elsewhere.Yet, in essence it means:
1) you must use it at your own risk, 
2) you must evaluate it and ensure it conforms to your specific use-case(s), 
3) neither I nor any of its contributors can be held liable for any unexpected circumstances you might face due to ignoring or overlooking items 1 and/or 2.

## What's included?
The following outlines the features that were produced during REDCap Spanish Hackathon 12'19 and are included in this version of the Swiss Army Tool External Module:
1. Advanced Tools plugin - Project level plugin, added to the Online Designer, that provides further information on every feature and plugin enabled on the Swiss Army Tool framework; every enabled plugin is shown in an itemized list of links. By - Ed Morales (emorales7@partners.org)
2. Add Custom Action Tag Descriptions - Hook that identifies action-tags added to the Swiss Army Framework and includes their descriptions to REDCap's pop-up window describing Action Tags. By - Ed Morales (emorales7@partners.org)
3. Translate "*Must Provide Value" - Action-tag that allows changing the label of required fields from English, to Spanish, French, German, or Portuguese. By - Ed Morales (emorales7@partners.org)
4. Auto PHI checker - Project level plugin that identifies and flags PHI fields in your project's data dictionary. By Luis Sanchez (luischipper@gmail.com)
5. Plugin Template - Template folder, with all required files to get you started building (or incorporating) your own plugin into the Swiss Army Tool framework. By - Ed Morales (emorales7@partners.org)
6. Restock coded values - Action-tag that restocks a code selected from a drop down or radio field back into its master fields - proves useful for conditional lists. By Victor Espinosa (victor.espinosa@viha.ca)
7. Themes Hook and UI - Project level plugin that allows changing REDCap's background theme; featuring Dark Mode. By Ed Morales (emorales7@partners.org)
8. User Language Switch - Hook that allows switching between language files using a button if there are one or more languages available at this REDCap instance. By Alvaro Ciganda (aciganda@gmail.com)

Furthermore, please be aware that the Swiss Army Tools External Module includes a language setting that must be set for every project. It's defaulted to be displayed in English, but it can be set to either:
Spanish, French, German, or Portuguese. 

Please visit the following link for more information about results of this hackathon:
[Link](https://community.projectredcap.org/articles/75452/redcap-spanish-group-project-draft.html)

## Call to Action
All the work provided in this External Module was voluntary without any monitory incentive. If you find this work useful, please Watch/Star/Fork its GitHub repository or email the author of the 
Swiss Army tools you're using and let them know you're using their work. A few words of appreciation go a long way in this business of voluntary work. 

## Thanks and Good Luck!