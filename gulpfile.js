/* jshint node: true */
'use strict';

var gulp = require( 'gulp' ),
	sass = require( 'gulp-sass' ),
	sourcemaps = require( 'gulp-sourcemaps' ),
	autoprefixer = require( 'gulp-autoprefixer' );

gulp.task( 'cssify', function(){
	gulp.src( './sass/style.scss' )
		.pipe(sourcemaps.init())
		.pipe( sass({ 
				indentType: 'tab', 
				indentWidth: 1, 
				outputStyle: 'expanded' 
			}).on( 'error', sass.logError )
		)
		.pipe( autoprefixer({ 
				browsers: ['> 5%'],
				cascade: false
		}) )
		.pipe(sourcemaps.write('./sass/maps'))
	.pipe( gulp.dest( './' ) );
} );

gulp.task( 'default', function(){
	gulp.watch( './sass/**/*.scss', ['cssify'] );
} );