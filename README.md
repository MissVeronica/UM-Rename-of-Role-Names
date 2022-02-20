# UM Rename of Role Display Names
Code snippet to support renaming of UM Role Display Names when being renamed by Role Editor plugins.

This code snippet will also recover from earlier failed User Roles renames where UM is listing the User Role without a Display Name.

## Requirements
### With existing UM Role Display Name
Make sure that the current Role Name displayed by WP or your Role Editor plugin is equal to the Role Name displayed by UM before doing a Role Name change with this code snippet active. 

Rollback any old attempts that failed to change the UM Role Display Name so WP and UM have equal Display Names. 

Use the "source_trace.php" code snippet for detailed info about the renaming process.
### Without existing UM Role Display Name
Make a rename of the User Role Display Name and the UM Role Display Name will be recovered with the new Display Name.
## Installation
Add the php source code snippet "source.php" to your child-theme's functions.php file

The "Code Snippets" plugin will NOT execute the code snippet.
## User Role Editor
Tested with: https://wordpress.org/plugins/user-role-editor/

## Trace the Rename process
The code snippet "source_trace.php" will display for each UM Role the Rename process.
If you have the PHP Error Log turned “On” the tracing text is written as "PHP Notice" for each UM Role to the PHP Error Log otherwise a log can be displayed with your browser at yourdomain/wp-content/umroles.html
