//
//  main.c
//  podvibes 
//
//  Created by HURRICANE germainntwali@icloud.com on 7/20/23.
//  Copyright © 2023 podvibes. All rights reserved.
//
//
// <!DOCTYPE plist PUBLIC "-//Apple//DTD PLIST 1.0//EN" "http://www.apple.com/DTDs/PropertyList-1.0.dtd">
// <plist version="1.0">
//

#include <stdio.h>

/* int main(int argc, const char * argv[]) {
    // psw == +1 )(if (psw > 1)
    gets)..
    printf("SIGNIN!\n");
    return 0;
}*/

int main () {
    
    //   credentials ([DEMO])
    int password = 12345;
    //  char timer = h; time in hours to limit
    
    int userpw = 12342;
    
    // checkout admin ONLY
  
    if (password == userpw) {
        printf("\t\t\t\t-\t PODVIBES SIGN_IN\t-\n\n\n");
        printf("\t\t\t\t access granted\n\n\n\n\n\n");
        // 
    } else if (password > userpw) {
         printf("\t\t\t\t-\t PODVIBES SIGN_IN\t-\n\n\n");
        printf("\t\t\t\t visit: https \\ www.podvibe.com to reset\n\n\n\n\n\n");
    }
    //
    else {
         printf("\t\t\t\t-\t PODVIBES SIGN_IN\t-\n\n\n");
        printf("\t\t\t\t input correct password & usernames\n\n\n\n\n\n");
    }
    return 0;
  
}



