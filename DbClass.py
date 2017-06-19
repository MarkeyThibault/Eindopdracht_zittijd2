class DbClass:
    #constructor --> zaken die nodig zijn bij de start
    def __init__(self):
        import mysql.connector as connector

        self.__dsn = {"host": "localhost",
            "user": "test",
            "passwd": "test",
            "db": "CoolCupDatabase"}
        self.__connection = connector.connect(**self.__dsn)
        self.__cursor = self.__connection.cursor()

    def getTempBinnen(self):
        query = "SELECT TemperatureIn FROM CoolCup"

        # query uitvoeren
        self.__cursor = self.__connection.cursor()
        self.__cursor.execute(query)

        #resultaat opvragen
        result = self.__cursor.fetchall()

        #cursor sluiten
        self.__cursor.close()

        return result

    def getTempBuiten(self):
        query = "SELECT TemperatureOut FROM CoolCup"

        # query uitvoeren
        self.__cursor = self.__connection.cursor()
        self.__cursor.execute(query)

        #resultaat opvragen
        result = self.__cursor.fetchall()

        #cursor sluiten
        self.__cursor.close()

        return result

    def getHour(self):
        query = "SELECT HOUR(Datetime) FROM CoolCup"

        # query uitvoeren
        self.__cursor = self.__connection.cursor()
        self.__cursor.execute(query)

        # resultaat opvragen
        result = self.__cursor.fetchall()

        # cursor sluiten
        self.__cursor.close()

        return result

    def setTemps(self, temp_binnen, temp_buiten, devicenaam):
        query = "INSERT INTO CoolCup (TemperatureIn, TemperatureOut, DateTime, DeviceName) VALUES ({param1}, {param2}, now(), '{param3}')"
        sqlCommand = query.format(param1=temp_binnen, param2=temp_buiten, param3=devicenaam)

        self.__cursor = self.__connection.cursor()
        self.__cursor.execute(sqlCommand)
        self.__connection.commit()
        self.__cursor.close()

    # def setTempBuiten(self, temp):
    #     query = "INSERT INTO CoolCup (TemperatureOut) VALUES ({param1})"
    #     sqlCommand = query.format(param1=temp)
    #
    #     self.__cursor = self.__connection.cursor()
    #     self.__cursor.execute(sqlCommand)
    #     self.__connection.commit()
    #     self.__cursor.close()

    def getAll(self):
        query = "SELECT TemperatureOut, TemperatureIn, CONCAT(HOUR(Datetime),':00')  FROM CoolCup"

        # query uitvoeren
        self.__cursor = self.__connection.cursor()
        self.__cursor.execute(query)

        # resultaat opvragen
        result = self.__cursor.fetchall()

        # cursor sluiten
        self.__cursor.close()

        return result

    def getDeviceName(self):
        query = "SELECT DeviceName FROM CoolCup"

        # query uitvoeren
        self.__cursor = self.__connection.cursor()
        self.__cursor.execute(query)

        #resultaat opvragen
        result = self.__cursor.fetchall()

        #cursor sluiten
        self.__cursor.close()

        return result