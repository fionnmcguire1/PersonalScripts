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
elif [ $1 == "gc" ]
then
	while [ 1 ]
	do	
		if [ -d .git ]
		then
			git add -A
			git commit -m $2
			break
		else
			git rev-parse --git-dir 2> /dev/null;
		fi
	done
fi

