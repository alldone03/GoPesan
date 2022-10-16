from time import sleep
import requests
import socket
import random

dataip = socket.gethostbyname(socket.gethostname())

while True:
    print("http://"+str(dataip)+":8000/api/updatesens?sensor1="+str(random.uniform(4.0, 20.0))+"&sensor2="+str(random.uniform(
        4.0, 20.0))+"&sensor3="+str(random.uniform(4.0, 20.0))+"&sensor4="+str(random.uniform(4.0, 20.0)))
    x = requests.get("http://"+str(dataip)+":8000/api/updatesens?sensor1="+str(random.uniform(4.0, 20.0))+"&sensor2="+str(random.uniform(
        4.0, 20.0))+"&sensor3="+str(random.uniform(4.0, 20.0))+"&sensor4="+str(random.uniform(4.0, 20.0)))
    print(x.status_code)
    sleep(1)
