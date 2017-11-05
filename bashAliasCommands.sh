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
	counter=0
	currentPath=pwd
	while [ 1 ]
	do	
		if [ -d .git ]
		then
			git add -A
			git commit -m "$2"
			cd "$currentPath/"
			break
		else
			$counter = $counter+1
			cd ../
		fi
		#Never going to have 3 or more nested folders 
		#Primarily because it's overkill for anything thats not web dev
		#This is basically to stop infinite loops
		if [ $counter >= 3 ]
		then
			echo "This alias doesn't allow for commits on 3 or more nested folders
			Use: user$ git add -A
			user$ git commit -m \"Message for commit! \"\n\n"
			break
		fi
	done
fi

