You can shorten your links now.

WOW!

Installation:

1. Add to composer.json
    [...]
       "require" : {
           [...]
           "wip/slinkbundle" : "dev-master"
       },
       "repositories" : [{
           "type" : "vcs",
           "url" : "https://github.com/Vagatan/SlinkBundle"
       }],
       [...]
2. Run composer update

3. Add to app/AppKernel.php:

    new WIP\SlinkBundle\SlinkBundle(),

4. Add to routing.yml
    slink:
        resource: "@SlinkBundle/Controller/"
        type: annotation
        prefix:   /

5. From vendor/wip/slinkbundle/ folder WIP to your src folder

6. Run server, enter /url