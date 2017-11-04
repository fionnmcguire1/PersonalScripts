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
alias hidefiles="sh /Users/FionnMcguire/Software\ Development/PersonalScripts/bashAliasCommands.sh hidefiles"
alias showfiles="sh /Users/FionnMcguire/Software\ Development/PersonalScripts/bashAliasCommands.sh showfiles"
alias numFiles='echo $(ls -1 | wc -l)'
alias apacheRestart='sudo apachectl graceful'
alias gc="sh /Users/FionnMcguire/Software\ Development/PersonalScripts/bashAliasCommands.sh gc $1"

#----------------------------------------------------#
#----------------------------------------------------#
#----------------------------------------------------#
