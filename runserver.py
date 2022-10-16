import os

import socket

print("Running ON: "+str(socket.gethostbyname(socket.gethostname())))
dataip = socket.gethostbyname(socket.gethostname())
os.system("php artisan serve --host "+dataip+" --port 80")
