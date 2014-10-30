module.exports = function(grunt) {

    grunt.initConfig({
        phpunit: {
            classes: {
                dir: 'tests'
            },
            options: {
                bin: 'vendor/bin/phpunit',
                bootstrap: 'vendor/autoload.php',
                colors: true
            }
        },
        watch: {
            test: {
                files: ['src/**/*', 'tests/**/*'],
                tasks: ['phpunit']
            }
         }
    });

    require('load-grunt-tasks')(grunt);

    grunt.registerTask('default', ['phpunit']);
};