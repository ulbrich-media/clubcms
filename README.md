[![Publish](https://github.com/ulbrich-media/clubcms/actions/workflows/publish.yaml/badge.svg)](https://github.com/ulbrich-media/clubcms/actions/workflows/publish.yaml)

# ClubCMS
A TYPO3 CMS based website template, made for clubs and smaller non-profit organisations.



## Release Flow 

Releases are done semi-automatically by GitHub Actions. For now this is the current flow: 

1. Change version number in files composer.json, ext_emconf.php and package.json
2. Commit and push these changes with message "chor(release): 0.1.2"
3. Trigger action "release" and enter the new version number 

From there everything else happens automatically: 
1. Build public assets for production 
2. Generate Changelog
3. Create GitHub Release and Tag 
4. Push new release to TER 
5. (Packagist pulls automatically)

Starting with version 0.2.2 the changelog (hopefully) gets generated automatically. For this to work commit messages need to follow the [conventional commits specification](https://www.conventionalcommits.org/). 