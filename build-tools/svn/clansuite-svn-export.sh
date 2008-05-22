# Clansuite - just an eSports CMS
# 
# -- SVN Checkout and Export --
# Author:   Jens-Andre Koch
# Version:  0.1 
# Date:     28.11.2007
# Licence:  GPL
#
# SVN: $Id$
#
# Working Procedure
# -----------------
# 1. SVN checkout the /trunk
# 2. If checkout exists, svn update will incrementally update the checkout
# 3. Based on that checkout, perform an svn export
#    This safes bandwidth, instead of exporting directly from gna.
# 4. SVN EXPORT Directory is archived as ".zip" and ".tar.gz"
#    into /home/clansuite/downloads/
# -----
# Create, signature and upload Archives
# -----
# 5. Archives are build
# 6. Webinstaller is fetched into the /downloads dir
# 7. Archives are GPG Signatured
# 8. All files are rsynced to download.gna.org

# Variables
# SVN Directory to work on
SVN_DIR_TRUNK=http://svn.gna.org/svn/clansuite/trunk/
CHECKOUT_DIR=/home/clansuite/svn
EXPORT_DIR=/home/clansuite/svn-export

# CHECKOUT 
# check if we have an checked out version already, (.svn) dir would exist then
if [ -d $CHECKOUT_DIR/.svn ]; then
    # SVN UPDATE (incremental)
    svn update $CHECKOUT_DIR
    echo "SVN UPDATE -- done --"
else
    # if directory exists, remove
    rm -rf $CHECKOUT_DIR
    # SVN CHECKOUT 
    svn checkout $SVN_DIR_TRUNK $CHECKOUT_DIR
    echo "SVN CHECKOUT -- done --"
fi

# EXPORT
# export the /trunk from SVN to the export directory  
rm -rf $EXPORT_DIR
#svn export $SVN_DIR_TRUNK $EXPORT_DIR
#echo "SVN EXPORT from GNA -- done --"
svn export $CHECKOUT_DIR $EXPORT_DIR
echo "SVN EXPORT from local SVN -- done --"

#--------

# ARCHIVE 
# ZIP 
# a new, mx=compresslevel7, t = zip, r recurse
7z a -mx7 -tzip /home/clansuite/downloads/clansuite.zip -r /home/clansuite/svn-export
echo "ZIP created!"

# TAR.GZ
# c=create new archive, v=verbose on, f=write to file, z=zip
tar cvzf /home/clansuite/downloads/clansuite.tar.gz /home/clansuite/svn-export
echo "TAR.GZ created!"

#--------

# Copy Webinstaller into /home/clansuite/downloads
cp /home/clansuite/svn-export/installation/webinstaller/* /home/clansuite/downloads/

#--------

# CREATE GPG SIGNATURES
gpg --detach /home/clansuite/downloads/webinstaller.php
gpg --detach /home/clansuite/downloads/clansuite.zip
gpg --detach /home/clansuite/downloads/clansuite.tar.gz
echo "Signatures created!"

#--------

# SCP - COPY STUFF TO GNA Downloads
#scp /home/clansuite/downloads/clansuite.zip* vain@download.gna.org:/upload/clansuite/
#scp /home/clansuite/downloads/clansuite.tar.gz vain@download.gna.org:/upload/clansuite/

# RSYNC - BETTER
# 1) Get the content on downloag.gna.org
#rsync -avr --rsh="ssh" vain@download.gna.org:/upload/clansuite/ /home/clansuite/downloads/
#echo "Content Fetch from GNA!"
# 2) Put the content on download.gna.org
rsync --delete -avr --rsh="ssh" /home/clansuite/downloads/ vain@download.gna.org:/upload/clansuite
echo "Content Uploaded to GNA!"
echo "---> Mission Complete! <---"