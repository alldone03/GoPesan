import os
import pyperclip
import socket
import time
import threading
import requests
import datetime


def time_in_range(start, end, current):
    """Returns whether current is in the range [start, end]"""
    return start <= current <= end


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

        start = datetime.time(8, 0, 0)
        end = datetime.time(10, 57, 0)
        current = datetime.datetime.now().time()
        flag = time_in_range(start, end, current)
        requests.get("http://"+self.dataip +
                     "/akjshdoehiaosifoanohkas/"+str("1" if time_in_range(start, end, current) else "0"))
        while True:

            current = datetime.datetime.now().time()
            if flag != time_in_range(start, end, current):
                flag = time_in_range(start, end, current)
                requests.get("http://"+self.dataip +
                             "/akjshdoehiaosifoanohkas/"+str("1" if time_in_range(start, end, current) else "0"))

            time.sleep(0.5)


if __name__ == "__main__":
    run = runapp()

    x = threading.Thread(target=run.startserver)
    x2 = threading.Thread(target=run.changestate)

    x.start()
    x2.start()
