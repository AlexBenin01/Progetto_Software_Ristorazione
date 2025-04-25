#include <iostream>
using namespace std;


int main(){

int matr[3][3];

for(int i=0;i<3;i++){
    for(int j=0;j<3;j++){
        cout<<"inserisci il valore della cella [ "<<i<<" ] ["<<j<<" ] "<<endl;
        cin>>matr[i][j];
    }
}
for(int i=0;i<3;i++){
    for(int j=0;j<3;j++){
        cout<<" | "<<matr[i][j]<<" | ";
    }
    cout<<endl;
}


    }
