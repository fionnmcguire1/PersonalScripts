#!/bin/bash
#This script is to alias certain commands to a sequence of commands

if [ $1 == "hidefiles" ]
then
	defaults write com.apple.finder AppleShowAllFiles -bool FALSE
	killall Finder	
elif [ $1 == "showfiles" ]
then
	defaults write com.apple.finder AppleShowAllFiles -bool TRUE
	killall Finder

fi

