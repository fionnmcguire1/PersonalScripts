#----------------------------------------------------#
#------------------- Setting Paths ------------------#
#----------------------------------------------------#

# Setting PATH for Python 3.4
# The orginal version is saved in .bash_profile.pysave
PATH="/Library/Frameworks/Python.framework/Versions/3.4/bin:${PATH}"
export PATH

# Setting PATH for Python 2.7
# The original version is saved in .bash_profile.pysave
PATH="/Library/Frameworks/Python.framework/Versions/2.7/bin:${PATH}"
export PATH

# Setting PATH for Python 2.7
# The original version is saved in .bash_profile.pysave
PATH="/Library/Frameworks/Python.framework/Versions/2.7/bin:${PATH}"
export PATH

# Setting PATH for Python 3.6
# The original version is saved in .bash_profile.pysave
PATH="/Library/Frameworks/Python.framework/Versions/3.6/bin:${PATH}"
export PATH

#---------------------------------------------------#
#--------- Configuring File Colour Scheme ----------#
#---------------------------------------------------#

export CLICOLOR=1
export LSCOLORS=CxFxGxDxBxegedabagaced

#----------------------------------------------------#
#------------ Configure commands alias --------------#
#----------------------------------------------------#

alias python=python3
alias shutdown="shutdown -f -t 300"
alias hidefiles="defaults write com.apple.finder AppleShowAllFiles -bool TRUE
killall Finder"
alias showfiles="defaults write com.apple.finder AppleShowAllFiles -bool FALSE
killall Finder"
alias numFiles='echo $(ls -1 | wc -l)'
alias apacheRestart='sudo apachectl graceful'

#----------------------------------------------------#
#----------------------------------------------------#
#----------------------------------------------------#


