import os
import pyperclip
import socket
import time
import threading
import requests


class runapp():
    state = 0
    dataip = socket.gethostbyname(socket.gethostname())

    def startserver(self):
        print("Running ON: http://" +
              str(socket.gethostbyname(socket.gethostname()))+"/")
        # os.system("code .")

        pyperclip.copy(str(socket.gethostbyname(socket.gethostname())))

        dataip = socket.gethostbyname(socket.gethostname())
        os.system("php artisan serve --host "+dataip+" --port 80")

    def changestate(self):
        while(self.state != 200):
            try:
                respon = requests.get("http://"+self.dataip+"/")
                self.state = respon.status_code
                print("waiting")
            except:
                print("error")

        os.system("start http://" +
                  str(socket.gethostbyname(socket.gethostname()))+" /")
        requests.get("http://"+self.dataip+"/akjshdoehiaosifoanohkas")


if __name__ == "__main__":
    run = runapp()

    x = threading.Thread(target=run.startserver)
    x2 = threading.Thread(target=run.changestate)

    x.start()
    x2.start()
