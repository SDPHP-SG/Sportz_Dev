This file describes how to setup your development environment.  The workflow for pulling files from the Github repository, modifying files and pushing them back to the repository is described in the file "docs/git/github workflow".

**Add examples of getting and installing an http server and IDE (e.g. wampserver and netbeans).  Also show how to get any necessary plugins e.g. git.  Also show how to use git to pull down the repository locally and describe the general workflow**

** There is a Github user "SDPHPSG" as well as an organization "SDPHP-SG" (note the dash in the organization).  The repositories were created under the organization because it allows a finer level of granularity for allowing users to "Push" back to a repo.

1) If you want to be able to contribute to this project (ie be able to "Push" back to the repo), create a github account for yourself (if you haven't already done so) and then let the Sportz admins know your github user name.  You will be able to "Pull" or "Clone" without doing this, so you only need to do this step if/when you want to contribute mods to the project.

2) "Clone" or "Pull" the Sportz_Dev repository from github.  You can pull down the "master" and "develop" branches but you will only be modifying the "develop" branch.  The Sportz_Dev repository url is: https://github.com/SDPHP-SG/Sportz_Dev.git .

3) Follow the git workflow described in the docs/git folder for modifying and pushing back to the github repo.

4) You will notice an ".htaccess" file at the top level of the project.  This file utilizes mod_rewrite which is an apache module and it is necessary that you configure mod_rewrite to be enabled in your http config file for the site to work properly on your local machine.

5) On the production machine the code_igniter "system" folder will probably be above the "application" folder.  You can leave it on the same level on your local machine or move it if you prefer.  If you move it, you must modify the "index.php" file in the root to point to the new location.