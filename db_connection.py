import pymysql
import time

# database connection
connection = pymysql.connect(
    host="localhost", user="root", passwd="", database="diseaseprediction"
)
cursor = connection.cursor()


# inserting data to db
def add_prediction(disease, prediction, sergiileh):
    ognoo = time.ctime()
    cursor.execute(
        "INSERT INTO prediction(ID,disease,tailbar,sergiileh,ognoo) VALUES (DEFAULT, %s,%s,%s,%s)",
        (disease, prediction, sergiileh, ognoo),
    )
    connection.commit()
    return 1


def get_data():
    cursor.execute("SELECT * FROM prediction")
    rows = cursor.fetchall()
    return rows
