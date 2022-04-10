/* this program is written by (20CP083).
for programming lab template practice. lab-11

in this program we have one array and size of subarray is given
we have to search for maximum element in array in subarray and print the same.
so this program done with use of deque template
*/

#include<iostream>
#include<deque>
using namespace std;

class dequee
{
    deque<int> mydeque; //initialize member
    int n ; //size
    int sub_size;
public:
    dequee()
    {
        int elem;
        cout<<"enter size of array"<<endl;
        cin>> n;
        cout<<"enter size sub array of array"<<endl;
        cin>> sub_size;
        cout<<"enter elements: "<<endl; //for take user input
        for(int i=0; i<n; i++)
        {
            cin>>elem;
            mydeque.push_back(elem);
        }
    }

    void find_max()
    {
        cout<<"output: ";
        for(int i=0; i<n-sub_size+1; i++) //for serching max in subarrays
        {

            int maxi=mydeque[i];
            for(int j=i;j<sub_size+i;j++){ // find the max in subarray and print same
                 if(maxi<mydeque[j])
                {
                    maxi= mydeque[j];
                }
            }
            cout<<maxi<<" ";
        }
        cout<<endl;
    }


};


int main()
{
    int test;
    cout<<"how much test case you want to test"<<endl; // this is for as many test case user want
    cin>>test;

    for(int i=0; i<test; i++)
    {
        dequee a ;
        a.find_max();

    }




    return 0;
}