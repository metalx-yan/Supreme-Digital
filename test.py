from flask import Flask
from second import second
import sys

app = Flask(__name__)
app.register_blueprint(second, url_prefix="/second")

@app.route("/")
def home():
    return sys.version

if __name__ == "__main__":
    app.run(debug=True)