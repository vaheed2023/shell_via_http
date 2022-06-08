import requests
import os

def clear():
    os.system('cls' if os.name=='nt' else 'clear')


url = 'https://example/api/run'

cmd = ""

while cmd != "exit":
    cmd = input("> ")
    
    if cmd == "clear":
        clear();
    else:  
        data = {'cmd': cmd}

        x = requests.post(url, data = data)

        print(x.text)
    

