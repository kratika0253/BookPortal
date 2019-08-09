echo "Database"
echo "Enter the database file"
read f
ch=0
while [ $ch -lt 3 ]
do 
	echo "Enter 1 for insertion into file"
	echo "Enter 2 for extraction from file"
	echo "Enter 3 for exit"
	read ch
	case $ch in
	1)echo "Enter roll number"
 	 read rno
 	 echo "Enter name"
 	 read name
 	 echo "Enter Semester"
 	 read sem
 	 echo "Enter cgpa"
 	 read cgpa
 	 final=$rno";"$name";"$sem";"$cgpa
 	 echo $final >> $f
 	 ;;
	2)echo "Enter roll number"
 	 read rno
 	 while read -r line 
 	 do
 		 x=`echo $line|cut -d ";" -f 1`
 		 if [ $rno -eq $x ]
 		 then
 		 echo $line
		 fi
 	 done < $f
 	 ;;
esac
done  
