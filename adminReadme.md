# Swiss Army Tools (External Module)

# Documentation for REDCap Administrators
The Swiss Army Tools is a framework (provided in form of an External Module) that allows managing custom made action tags, smart variables,
hooks, and plugins from the Control Center. It was developed for the REDCap Spanish Group's Hackathon of 12'19 with the sole purpose of enabling collaboration among the group
and provide any and all resulting products back to the REDCap Consortium.

What this means for you? If you ever wanted to enable/disable certain of your custom made REDCap enhancements easily - this is the External Module
you've been waiting for. Adding your hooks and/or plugins to the Swiss Army Tool framework provides control over these enhancements. A feature of this kind
proves valuable when a feature becomes obsolete (due to new technology, a REDCap upgrade, or scheduled decomission).

<b>Notice:</b> the work outlined here is covered by the MIT license. Please look for its definition elsewhere.Yet, in essence it means:
1) you must use it at your own risk, 
2) you must evaluate it and ensure it conforms to your specific use-case(s), 
3) neither I nor any of its contributors can be held liable for any unexpected circumstances you might face due to ignoring or overlooking items 1 and/or 2.

## What's included?
The following outlines the features that were produced during REDCap Spanish Hackathon 12'19 and are included in this version of the Swiss Army Tool External Module:
0. Swiss Army Framework that allows collaboration between developers - by Ed Morales (emorales7@partners.org) & Alvaro Ciganda (aciganda@gmail.com)
1. Advanced Tools plugin - Project level plugin, added to the Online Designer, that provides further information on every feature and plugin enabled on the Swiss Army Tool framework; every enabled plugin is shown in an itemized list of links. By - Ed Morales (emorales7@partners.org)
2. Add Custom Action Tag Descriptions - Hook that identifies action-tags added to the Swiss Army Framework and includes their descriptions to REDCap's pop-up window describing Action Tags. By - Ed Morales (emorales7@partners.org)
3. Translate "*Must Provide Value" - Action-tag that allows changing the label of required fields from English, to Spanish, French, German, or Portuguese. By - Ed Morales (emorales7@partners.org)
4. Auto PHI checker - Project level plugin that identifies and flags PHI fields in your project's data dictionary. By Luis Sanchez (luischipper@gmail.com)
5. Plugin Template - Template folder, with all required files to get you started building (or incorporating) your own plugin into the Swiss Army Tool framework. By - Ed Morales (emorales7@partners.org)
6. Menu Merge - Action-tag that copies selected values from two or more radio buttons/drop down conditional lists to another that contains all the options of the former ones. It acts like in the form of selecting a continent from a list and then a country from a specific list and saving the option in the global list (for reporting and other purposes). By Victor Espinosa (victor.espinosa@viha.ca)
7. Themes Hook and UI - Project level plugin that allows changing REDCap's background theme; featuring Dark Mode. By Ed Morales (emorales7@partners.org)
8. User Language Switch - Hook that allows switching between language files using a button if there are one or more languages available at this REDCap instance. By Alvaro Ciganda (aciganda@gmail.com)

Furthermore, please be aware that the Swiss Army Tools External Module includes a language setting that must be set for every project. It's defaulted to be displayed in English, but it can be set to either:
Spanish, French, German, or Portuguese. 

Please visit the following link for more information about results of this hackathon:
[Link](https://community.projectredcap.org/articles/75452/redcap-spanish-group-project-draft.html)

## Getting Started After Installing the Swiss Army Tools External Module on your REDCap Instance
The Swiss Army Tools framework provides full control over every feature it includes. 
The configuration of this external module provides information that can help you understand what's the expected use-case for each feature, as well as how and when to use it. 
It is recommended you learn more about these features before enabling in your REDCap Instance, i.e. enable and test them on a test instance until you feel comfortable with its form and function.

### Suggested Minimum Configuration
It is recommended that you enabled the Advanced Tools plugin. It provides the end-user the same information that REDCap Admins can see in the configuration settings of this External Module in REDCap's Control Center. 
The information is provided in an additional tab within their project's Online Designer (only if this external module is enabled on their project).
Plus, it provides a UI in which this information is displayed, as well as links to plugins if any have been enabled.

## How to add your own Hooks/Plugins into the Swiss Army Framework in your Local Environment
The Swiss Army Framework was designed to worked based on a configuration file unique for every feature (tool) added to the framework.
In addition to the minimum required files by REDCap's External Module framework, the Swiss Army Tools Framework expects a configuration file in each of the features 
added to its features folder. The configuration file must include all expected constants (including language constants), flags indicating when the feature is expected to be executed, and 
additional information such as name, version, author, etc. The current structure of the Swiss Army Tool framework is the following:

|-- swiss_army_v1.0/<br>
&nbsp;&nbsp;&nbsp;&nbsp;|-- features/<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|-- new_feature/<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|-- config.json <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|-- new_feature.php <br>
&nbsp;&nbsp;&nbsp;&nbsp;|-- config.json<br>
&nbsp;&nbsp;&nbsp;&nbsp;|-- README.md<br>
&nbsp;&nbsp;&nbsp;&nbsp;|-- swiss_army.php<br> 

It is important to note that there are slightly different requirements for including hooks or plugins to the Swiss Army Framework.
While the actual development of new features is left completely up to you, it is recommended to guide your next steps based on existing hooks or plugins already in the framework.
Please browse through the folder named "features" to see the working set of configuration options for your specific needs.
The main difference is the new feature's config key-value named "Type"; it must be specified with either:
* action-tag
* hook
* plugin
* smart-variable

In short, in order to add a new feature to the Swiss Army Tools Framework you must bundle your code in the folder-file structured outlined above.
Then, place your folder in the "features" folder and the Swiss Army Tools Framework will detect it and execute its code based on its configuration values (on your code's config.json file). 

## Contributing to the Swiss Army Tool framework through GitHub for Hackathons or Otherwise
If you develop a hook/plugin and would like your work to be included as part of the Swiss Army Tool framework, please use github to get your code in.
The steps are simple, but can get confusing if it's the first time you're using GitHub. Here are the steps:
1. Clone the repository onto your local machine using any GitHub interface you're comfortable with (I use SourceTree.)
2. Add a folder to the features folder, with your code's name/title
3. Add the config.json and main php file to this folder
4. Develop your work using these files and this folder only.
5. Once ready, stage your changes locally in your machine, commit them, and send a pull request to the appropriate branch in GitHub.

All new and stable code will be released after every hackathon takes place.

## Reporting a Bug
Please report all bugs to the author of the particular Swiss Army Tool you would like to be improved. The bug fix will be handled through a pull request and release to the consortium ASAP.

## Call to Action
All the work describe in this document was voluntary without any monitory incentive. If you find this work useful, please Watch/Star/Fork this GitHub repository or email the author of the 
Swiss Army tool you're using and let them know you're using their work. A few words of appreciation go a long way in this business of voluntary work. 

## Thanks and Good Luck!