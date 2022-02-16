# UM Rename of Role Display Names
Code snippet to support renaming of UM Role Display Names when being renamed by Role Editor plugins.

This code snippet will also recover from earlier failed User Roles renames where UM is listing the User Role without a Display Name.

## Requirements
### With existing UM Role Display Name
Make sure that the current Role Name displayed by WP or your Role Editor plugin is equal to the Role Name displayed by UM before doing a Role Name change with this code snippet active. 

Rollback any old attempts that failed to change the UM Role Display Name so WP and UM have equal Display Names. 
### Without existing UM Role Display Name
Make a rename of the User Role Display Name and the UM Role Display Name will be recovered with the new Display Name.
## Installation
Add the php source code to your child-theme's functions.php file

or use the "Code Snippets" plugin: https://wordpress.org/plugins/code-snippets/
## User Role Editor
Tested with: https://wordpress.org/plugins/user-role-editor/
