<<<<<<< HEAD:LineBot.py
#import libaries
import errno
import os
import sys
import tempfile
from argparse import ArgumentParser
from keras.models import load_model
from keras.preprocessing import image
from tensorflow import keras
import numpy as np
import cv2
import logging


from flask import Flask, request, abort, send_from_directory
from werkzeug.middleware.proxy_fix import ProxyFix

from linebot import (
    LineBotApi, WebhookHandler
)
from linebot.exceptions import InvalidSignatureError
from linebot.models import (
    MessageEvent, TextMessage, TextSendMessage,ImageMessage)

from paddleocr  import PaddleOCR # main OCR dependencies
from matplotlib import pyplot as plt # plot images
import cv2 #opencv 
import os # folder directory navigation

from PIL import Image

import gspread 
from oauth2client.service_account import ServiceAccountCredentials

from paddleocr  import PaddleOCR, draw_ocr # main OCR dependencies
from matplotlib import pyplot as plt # plot images
import cv2 #opencv
import os # folder directory navigation

app = Flask(__name__)

#การเชื่อมต่อ google sheet
scope = ["https://spreadsheets.google.com/feeds",'https://www.googleapis.com/auth/spreadsheets',"https://www.googleapis.com/auth/drive.file","https://www.googleapis.com/auth/drive"]
cerds = ServiceAccountCredentials.from_json_keyfile_name("creds.json", scope)
client = gspread.authorize(cerds)

#การดึงข้อมูลจาก google sheet
sheet = client.open("ingredient").worksheet('Sheet1') # เป็นการเปิดไปยังหน้าชีตนั้นๆ
data = sheet.get_all_values()  # การรับรายการของระเบียนทั้งหมด
column1_values = sheet.col_values(1)


#การเชื่อมต่อกับ line bot
#channel secret ของ line bot
CHANNEL_SECRET ='19f084c1acc0e3b9336adf756b42b374' #channel secret ของ line bot
#channel access token ของ line bot
CHANNEL_ACCESS_TOKEN = 'mfnxk2L5JR9dgn4dmrjhav9OTmuLlmsiBEIH1IblzOvSyFnxaKT+43Tau/naG9+h3yYB9vjxGVui/+mng6vcnsGQXR+Su4USxh0p+N6KSlH7a0hr0gOsGQRaS6SSnUwYkUbdWBRtzpBTO/AZbEwIpgdB04t89/1O/w1cDnyilFU=/rFE2t++yVJ7DM6I3vuQdB04t89/1O/w1cDnyilFU='
if CHANNEL_SECRET is None or CHANNEL_ACCESS_TOKEN is None:
    print('Specify LINE_CHANNEL_SECRET and LINE_CHANNEL_ACCESS_TOKEN as environment variables.')
    sys.exit(1)

line_bot_api = LineBotApi(CHANNEL_ACCESS_TOKEN)
handler = WebhookHandler(CHANNEL_SECRET)


static_tmp_path = os.path.join(os.path.dirname(__file__), 'static', 'tmp')

def make_static_tmp_dir():
    try:
        os.makedirs(static_tmp_path)
    except OSError as exc:
        if exc.errno == errno.EEXIST and os.path.isdir(static_tmp_path):
            pass
        else:
            raise

# Configure logging
logging.basicConfig(level=logging.INFO)
app.logger.setLevel(logging.DEBUG)

@app.route('/')
def hello_world():
    return 'Hello, World!'

@app.route("/callback", methods=["POST"])
def callback():
    signature = request.headers["X-Line-Signature"]
    body = request.get_data(as_text=True)

    try:
        handler.handle(body, signature)
    except InvalidSignatureError:
        abort(400)

    return "OK"

#detect ImageMessage
@handler.add(MessageEvent, message=ImageMessage)
def handle_image_message(event):
    
    
    if isinstance(event.message, ImageMessage):
        ext = 'jpg'
    else:
        return
    
    #saveรูปและเก็บpathรูป
    message_content = line_bot_api.get_message_content(event.message.id)
    with tempfile.NamedTemporaryFile(dir=static_tmp_path, prefix=ext + '-', delete=False) as tf:
        for chunk in message_content.iter_content():
            tf.write(chunk)
        tempfile_path = tf.name

    dist_path = tempfile_path + '.' + ext
    dist_name = os.path.basename(dist_path)
    os.rename(tempfile_path, dist_path)
    image = cv2.imread(dist_path)
    
    #call ocr model -libary paddleocr
    ocr_model = PaddleOCR(lang='en')
    result = ocr_model.ocr(image)
    texts = [res[1][0] for res in result[0]]
    
    line_bot_api.reply_message(
        event.reply_token,
        TextSendMessage(texts)
    )

#detect TextMessage
@handler.add(MessageEvent, message=TextMessage)
def handle_text_message(event):
    str = event.message.text
    list = str.split(',')
    resultsum = 'ประเภท :'
    result1sum='คุณสมบัติ\n'
    #วนลูปหา keyword ใน google sheet
    for textt,l in zip(list,range(len(list))):
        k=0
        print(textt)
        for i in range(len(column1_values)):
            if column1_values[i] == textt:
                k=1
                result = sheet.cell(i+1, 2).value
                result1 = sheet.cell(i+1, 3).value
                resultsum += result
                result1sum += result1
                if l!=len(list)-1 :
                   resultsum += ',' 
                   result1sum += '\n\n' 
                break
                
        if k == 0:
            resultsum += 'ไม่มี'
            result1sum += 'ไม่มี\n\n'
            if l!=len(list)-1 :
                resultsum += ',' 
                result1sum += ','

    line_bot_api.reply_message(event.reply_token,[TextSendMessage(resultsum),TextSendMessage(result1sum)])
    
            
@app.route('/static/<path:path>')
def send_static_content(path):
    return send_from_directory('static', path)


if __name__ == "__main__":
    arg_parser = ArgumentParser(
        usage='Usage: python ' + __file__ + ' [--port <port>] [--help]'
    )
    arg_parser.add_argument('-p', '--port', type=int, default=5000, help='port')
    arg_parser.add_argument('-d', '--debug', default=False, help='debug')
    options = arg_parser.parse_args()

    # create tmp dir for download content
    make_static_tmp_dir()

    app.run(debug=options.debug, port=options.port)

=======
#import libaries
import errno
import os
import sys
import tempfile
from argparse import ArgumentParser
from keras.models import load_model
from keras.preprocessing import image
from tensorflow import keras
import numpy as np
import cv2
import logging


from flask import Flask, request, abort, send_from_directory
from werkzeug.middleware.proxy_fix import ProxyFix

from linebot import (
    LineBotApi, WebhookHandler
)
from linebot.exceptions import InvalidSignatureError
from linebot.models import (
    MessageEvent, TextMessage, TextSendMessage,ImageMessage)

from paddleocr  import PaddleOCR # main OCR dependencies
from matplotlib import pyplot as plt # plot images
import cv2 #opencv 
import os # folder directory navigation

from PIL import Image

import gspread 
from oauth2client.service_account import ServiceAccountCredentials

from paddleocr  import PaddleOCR, draw_ocr # main OCR dependencies
from matplotlib import pyplot as plt # plot images
import cv2 #opencv
import os # folder directory navigation

app = Flask(__name__)

#การเชื่อมต่อ google sheet
scope = ["https://spreadsheets.google.com/feeds",'https://www.googleapis.com/auth/spreadsheets',"https://www.googleapis.com/auth/drive.file","https://www.googleapis.com/auth/drive"]
cerds = ServiceAccountCredentials.from_json_keyfile_name("creds.json", scope)
client = gspread.authorize(cerds)

#การดึงข้อมูลจาก google sheet
sheet = client.open("ingredient").worksheet('Sheet1') # เป็นการเปิดไปยังหน้าชีตนั้นๆ
data = sheet.get_all_values()  # การรับรายการของระเบียนทั้งหมด
column1_values = sheet.col_values(1)


#การเชื่อมต่อกับ line bot
#channel secret ของ line bot
CHANNEL_SECRET ='19f084c1acc0e3b9336adf756b42b374' #channel secret ของ line bot
#channel access token ของ line bot
CHANNEL_ACCESS_TOKEN = 'mfnxk2L5JR9dgn4dmrjhav9OTmuLlmsiBEIH1IblzOvSyFnxaKT+43Tau/naG9+h3yYB9vjxGVui/+mng6vcnsGQXR+Su4USxh0p+N6KSlH7a0hr0gOsGQRaS6SSnUwYkUbdWBRtzpBTO/AZbEwIpgdB04t89/1O/w1cDnyilFU=/rFE2t++yVJ7DM6I3vuQdB04t89/1O/w1cDnyilFU='
if CHANNEL_SECRET is None or CHANNEL_ACCESS_TOKEN is None:
    print('Specify LINE_CHANNEL_SECRET and LINE_CHANNEL_ACCESS_TOKEN as environment variables.')
    sys.exit(1)

line_bot_api = LineBotApi(CHANNEL_ACCESS_TOKEN)
handler = WebhookHandler(CHANNEL_SECRET)


static_tmp_path = os.path.join(os.path.dirname(__file__), 'static', 'tmp')

def make_static_tmp_dir():
    try:
        os.makedirs(static_tmp_path)
    except OSError as exc:
        if exc.errno == errno.EEXIST and os.path.isdir(static_tmp_path):
            pass
        else:
            raise

# Configure logging
logging.basicConfig(level=logging.INFO)
app.logger.setLevel(logging.DEBUG)

@app.route('/')
def hello_world():
    return 'Hello, World!'

@app.route("/callback", methods=["POST"])
def callback():
    signature = request.headers["X-Line-Signature"]
    body = request.get_data(as_text=True)

    try:
        handler.handle(body, signature)
    except InvalidSignatureError:
        abort(400)

    return "OK"

#detect ImageMessage
@handler.add(MessageEvent, message=ImageMessage)
def handle_image_message(event):
    
    
    if isinstance(event.message, ImageMessage):
        ext = 'jpg'
    else:
        return
    
    #saveรูปและเก็บpathรูป
    message_content = line_bot_api.get_message_content(event.message.id)
    with tempfile.NamedTemporaryFile(dir=static_tmp_path, prefix=ext + '-', delete=False) as tf:
        for chunk in message_content.iter_content():
            tf.write(chunk)
        tempfile_path = tf.name

    dist_path = tempfile_path + '.' + ext
    dist_name = os.path.basename(dist_path)
    os.rename(tempfile_path, dist_path)
    image = cv2.imread(dist_path)
    
    #call ocr model -libary paddleocr
    ocr_model = PaddleOCR(lang='en')
    result = ocr_model.ocr(image)
    texts = [res[1][0] for res in result[0]]
    
    line_bot_api.reply_message(
        event.reply_token,
        TextSendMessage(texts)
    )

#detect TextMessage
@handler.add(MessageEvent, message=TextMessage)
def handle_text_message(event):
    str = event.message.text
    list = str.split(',')
    resultsum = 'ประเภท :'
    result1sum='คุณสมบัติ\n'
    #วนลูปหา keyword ใน google sheet
    for textt,l in zip(list,range(len(list))):
        k=0
        print(textt)
        for i in range(len(column1_values)):
            if column1_values[i] == textt:
                k=1
                result = sheet.cell(i+1, 2).value
                result1 = sheet.cell(i+1, 3).value
                resultsum += result
                result1sum += result1
                if l!=len(list)-1 :
                   resultsum += ',' 
                   result1sum += '\n\n' 
                break
                
        if k == 0:
            resultsum += 'ไม่มี'
            result1sum += 'ไม่มี\n\n'
            if l!=len(list)-1 :
                resultsum += ',' 

    line_bot_api.reply_message(event.reply_token,[TextSendMessage(resultsum),TextSendMessage(result1sum)])
    
            
@app.route('/static/<path:path>')
def send_static_content(path):
    return send_from_directory('static', path)


if __name__ == "__main__":
    arg_parser = ArgumentParser(
        usage='Usage: python ' + __file__ + ' [--port <port>] [--help]'
    )
    arg_parser.add_argument('-p', '--port', type=int, default=5000, help='port')
    arg_parser.add_argument('-d', '--debug', default=False, help='debug')
    options = arg_parser.parse_args()

    # create tmp dir for download content
    make_static_tmp_dir()

    app.run(debug=options.debug, port=options.port)

>>>>>>> f882920bf08b0795ac53d87966e3f3e5f51530e9:test.py
