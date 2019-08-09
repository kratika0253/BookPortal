echo "Enter the following to"
echo "1. Create a directory"
echo "2. Modify a directory"
echo "3. Search through a directory"
echo "4. Listing directories"
echo "5. Exit"
read x
case $x in 
1) echo "Enter directory name"
   read name
::
2) echo "Enter the following to"
   echo "1.Copy"
   echo "2.Rename"
   echo "3.Move"
   echo "4.Delete"
   echo "5.Exit"
   read y
   case $y in 
   1)echo "Enter source directory"
     echo "Enter destination directory"
   ::
   2)  	
::
esac
