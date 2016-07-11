'use strict';
module.exports = function (grunt) {

    grunt.initConfig({
        jshint: {
            options: {
                jshintrc: '.jshintrc'
            },
            all: [
                'Gruntfile.js',
                'assets/js/*.js'
            ]
        },
        uglify: {
            min: {
                files: grunt.file.expandMapping([
                    'assets/js/*.js',
                    '!assets/js/*.min.js'
                ], 'assets/js/', {
                    rename: function (destBase, destPath) {
                        return destBase + destPath.replace('.js', '.min.js');
                    },
                    flatten: true
                })
            }
        },
        cssmin: {
					options:{
						keepSpecialComments: 0
					},
          minify: {
            expand: true,
            cwd: 'assets/css/',
            src: ['*.css', '!*.min.css'],
            dest: 'assets/css/',
            ext: '.min.css'
          }
        },

        watch: {
            css: {
                files: [
                    'assets/css/*.css',
                    '!assets/css/*.min.css',
                    '!assets/js/*.min.css'
                ],
                tasks: ['cssmin']
            },
            js: {
                files: [
                    '<%= jshint.all %>'
                ],
                tasks: ['uglify']
            },
            livereload: {
                // Browser live reloading
                // https://github.com/gruntjs/grunt-contrib-watch#live-reloading
                options: {
                    livereload: true
                },
                files: [
                    'assets/css/open-table-widget.css',
                    'assets/js/open-table-widget.js',
                    '*.php'
                ]
            }
        }
    });

    // Load tasks
//    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-watch');
//    grunt.loadNpmTasks('grunt-recess');

    // Register tasks
    grunt.registerTask('default', [
        'cssmin',
        'uglify'
    ]);
    grunt.registerTask('dev', [
        'watch'
    ]);

};
