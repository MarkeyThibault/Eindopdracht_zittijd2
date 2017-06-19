from flask import Flask, render_template
from DbClass import DbClass
import os

app = Flask(__name__)

@app.route('/')
def index():
    DB_layer = DbClass()

    devicelist = DB_layer.getDeviceName()
    devicetupple = devicelist[0]
    devicenaam = devicetupple[0]

    return render_template('base.html', DeviceID = devicenaam)

@app.route('/verbruik')
def verbruik():
    DB_layer = DbClass()

    # binnen_list = DB_layer.getTempBinnen()
    # binnen_tupple = binnen_list[0]
    # binnen_value = binnen_tupple[0]
    #
    # hour_list = DB_layer.getHour()
    # hour_tupple = hour_list[0]
    # hour_value = str(hour_tupple[0]) + ':00'
    #
    # buiten_list = DB_layer.getTempBuiten()
    # buiten_tupple = buiten_list[0]
    # buiten_value = buiten_tupple[0]

    values = DB_layer.getAll()

    devicelist = DB_layer.getDeviceName()
    devicetupple = devicelist[0]
    devicenaam = devicetupple[0]

    return render_template('Graph script.html', values = values, DeviceID = devicenaam)

if __name__ == '__main__':
    port = int(os.environ.get("PORT", 8080))
    host = "169.254.10.1"
    app.run(host=host, port=port, debug=False)