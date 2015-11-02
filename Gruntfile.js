module.exports = function(grunt) {
    // 1. All configuration goes here 
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        uglify: {
            scripts: {
                src: 'js/source/scripts.js',
                dest: 'js/scripts.js'
                // files:{
                //     "js/output.min.js": [
                //       'js/source/scripts.js',
                //       'js/source/modificar.js'
                //     ]
                // }
            },
            modificar: {
                src: 'js/source/modificar.js',
                dest: 'js/modificar.js'
            }
        },
        watch: {
            options: {
                livereload: true,
            },
            scripts: {
                files: ['js/source/*.js'],
                tasks: ['uglify'],
                options: {
                    spawn: false,
                },
            },
            css: {
                files: [
                  'css/stylus/*.styl'
                ],
                tasks: ['stylus'],
                options: {
                    spawn: false,
                },
            },
            jadephp: {
                files: ['jade/*.jade'],
                tasks: ['jadephp'],
                options: {
                    spawn: false,
                },
            }
        },
        stylus: {
            compile: {
                options: {
                    compress: true,
                    paths: ['css'],
                    import: [
                      'nib/*'
                    ]
                },
                files: {
                    "css/style.css": ['css/stylus/style.styl'] 
                }
            }
        },
        jadephp: {
            compile: {
                expand: true,
                cwd: 'jade/',
                src: ['*.jade'],
                dest: '',
                ext: '.php',
                options: {
                  //pretty: true
                },
            }
        }
    });

    // 3. Where we tell Grunt we plan to use this plug-in.
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-stylus');
    grunt.loadNpmTasks('grunt-jade-php');

    // 4. Where we tell Grunt what to do when we type "grunt" into the terminal.
    grunt.registerTask('default', ['uglify','watch','stylus','jadephp']);

};