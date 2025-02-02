# main.py
from app import App

app = App()

@app.route('/hello', methods=['GET'])
def hello():
    return '{"message": "Hello, World!"}'

@app.route('/data', methods=['POST'])
def data():
    return '{"message": "Data received!"}'

if __name__ == '__main__':
    app.run()