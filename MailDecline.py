import smtplib
import sys

toAddress = sys.argv[1]
fromaddr = sys.argv[2]
filename = sys.argv[3]
text="Sorry your file "+filename+" has been rejected by "+fromaddr+" please make changes accordingly."

# print(toAddress)
server = smtplib.SMTP_SSL("smtp.gmail.com",465)
server.login("paperlessoffice1@gmail.com","nasraspavi")
server.sendmail("paperlessoffice1@gmail.com",
                toAddress,
                text
                )
server.quit()   