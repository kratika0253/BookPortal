#include<stdio.h>
#include<math.h>
#include<stdlib.h>

int traversingrows(int tar[], int bar[], int iar[], int isize, int jsize) 
{
	int t, b, i, qi,ri, z = 0;
	for (i = 0; i <= isize; i++) 
	{
		/*Checking if wrapping is required*/
		qi = i / isize;
		ri = i % isize;

		/*If wrapping is not required*/
		if (ri > 0) 
		{
			t = i - 1;
			b = i + 1;
		}
		
		/*If wrapping is required*/ 
		else if (ri == 0) 
		{
			/*linking the first row to the last row*/
			if (qi == 0) 
			{
				t = isize;
				b = i + 1;
			}
			/*linking the last row to the first row*/
			else if (qi == 1) 
			{
				t = i - 1;
				b = 0;
			}/*end if*/
		}/*end if*/

		/*Storing values in respective arrays*/
		tar[z] = t;
		bar[z] = b;
		iar[z] = i;
		z++;

	}/*end for*/

}/*end function*/

int traversingcoloumns(int lar[], int rar[], int jar[], int isize, int jsize) 
{
	int l, r, j, qj, rj, z = 0;
	for (j = 0; j <= jsize; j++) 
	{
		/*Checking if wrapping is required*/
		qj = j / jsize;
		rj = j % jsize;

		/*If wrapping is not required*/
		if (rj > 0) 
		{
			l = j - 1;
			r = j + 1;
		}

		/*If wrapping is required*/  
		else if (rj == 0) 
		{
			/*linking left coloumn to the right coloumn*/
			if (qj == 0) 
			{
				l = jsize;
				r = j + 1;
			}
			/*linking right coloumn to the left coloumn*/
			else if (qj == 1) 
			{
				l = j - 1;
				r = 0;
			}/*end if*/

		}/*end if*/

		/*Storing values in respective arrays*/
		lar[z] = l;
		rar[z] = r;	
		jar[z] = j;
		z++;

	}/*end for*/

}/*end function*/

void printMatrix(int *a[], int isize, int jsize) 
{

	int i, j;
	for (i = 0; i <= isize; i++) 
	{
		for (j = 0; j <= jsize; j++) 
		{	
			printf("%d", a[i][j]);
			printf("\t");
		}/*end for*/
		printf("\n\n");
	}/*end for*/

}/*end func*/

int main() 
{ 
	/*Defining the variables*/
	int dyn,jsize,isize, j, i, m, n, k, c = 0, itrcount=0;

	/*Taking user input for size of the grid*/
	printf("Please enter the number of rows-\n");
	scanf("%d",&isize);
	printf("Please enter the number of coloumns-\n");
	scanf("%d",&jsize);
	isize=isize-1;
	jsize=jsize-1;

	/*Dynamic memory allocation*/

	int **a = (int **)calloc(isize,sizeof(int *));
	for(dyn=0;dyn<=isize;dyn++)
	{
		a[dyn]=(int *)calloc(jsize,sizeof(int));
	}

	/*Printing the matrix*/
	printMatrix(a, isize, jsize);
	
	/*Taking user input*/
	while (1) 
	{
		printf("Please enter the row and coloumn of the cell you wish to mark\n");
		printf("Row-\n");
		scanf("%d", &m);
		printf("Coloumn-\n");
		scanf("%d", &n);
		a[m - 1][n - 1] = 1;
		printMatrix(a, isize, jsize);
		printf("Press 1 if you want to continue marking cells, else press 0\n");
		scanf("%d", &k);
		if (k == 0) 
		{
			break;
		}
	}/*END while(1)*/


	/*Calculating the next gen grid*/

	/*Dynamic memory allocation*/

	int *bar = (int *)malloc(isize*sizeof(int));
	int *tar = (int *)malloc(isize*sizeof(int));
	int *iar = (int *)malloc(isize*sizeof(int));
	int *lar = (int *)malloc(jsize*sizeof(int));
	int *rar = (int *)malloc(jsize*sizeof(int));
	int *jar = (int *)malloc(jsize*sizeof(int));
	int **ld = (int **)calloc(isize,sizeof(int *));
	for(dyn=0;dyn<=isize;dyn++)
	{
		ld[dyn]=(int *)calloc(jsize,sizeof(int));
	}
	int *sum = (int *)malloc(isize*jsize*sizeof(int));	
	

	/*Importing the wrapping from the respective functions*/
	traversingrows(tar, bar, iar, isize, jsize);
	traversingcoloumns(lar, rar, jar, isize, jsize);

	while (1) 
	{
		int p,z, x, tu = 0, gu = 0;
		

		/*Calculating the sum for the cells*/
		for (x = 0; x <= isize; x++) 
			{
				for (z = 0; z <= jsize; z++) 
				{
					sum[tu] = a[tar[x]][lar[z]] + a[tar[x]][jar[z]] + 							  a[tar[x]][rar[z]] + a[iar[x]][lar[z]] + 							  a[iar[x]][rar[z]] + a[bar[x]][lar[z]] + 							  a[bar[x]][jar[z]] + a[bar[x]][rar[z]];
			
					tu++;
				}/*end for*/
			}/*end for*/


		/*Deciding the fate of cells*/
		for (i = 0; i <= isize; i++) 
		{
			for (j = 0; j <= jsize; j++) 
			{
				if (sum[gu] == 3) 
				{
					ld[i][j] = 1;
				}
				else if(sum[gu]==2)
				{
					if(a[i][j]==1)
					{
						ld[i][j]=1;
					}
				} 
				else 
				{
					ld[i][j] = 2;
				}
				gu++;
			}/*end for*/
		}/*end for*/

		/*Creating the new generation cells*/
		for (i = 0; i <= isize; i++) 
		{
			for (j = 0; j <= jsize; j++) 
			{
				if (ld[i][j] == 1) 
				{
					a[i][j] = 1;
				} 
				else if (ld[i][j] == 2) 
				{
					a[i][j] = 0;
				}

			}/*end for*/

		}/*end for*/


		printMatrix(a, isize, jsize);
		
		/*Recording the number of iterations*/
		itrcount++;
		printf("Number of iterations-%d\n",itrcount);
		printf("If you would like to continue simulating then press 1, else press 0\n");
		scanf("%d", &p);
		if (p == 0)
		{
			break;
		}
		system("clear");
	}/*end while(1)*/

	return 0;
}/*end main*/
