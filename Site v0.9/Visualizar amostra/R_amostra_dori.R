#Teste estatistico projeto
#nome: João Vitor da Silva Ferreira



#Instalar pacotes

#COLOQUE O ENDEREÇO E RODE ANTES DE TUDO AS 300 BIBLIOTECAS!
# Carregar o pacote SQL
library(RMySQL)
library(DBI)
library(tidyr)

library(agricolae)  # HSD.test(), SNK.test().
library(ScottKnott) # SK().
library(car)        # linearHypothesis().
library(multcomp)   # glht().
library(emmeans)    # emmeans()
library(tidyverse)

library(lmtest)   
library(ggplot2)              # Load the package
library(ggpmisc)   
library(pacman)

library (PerformanceAnalytics)
library(corrplot) # faz esferas
library(Hmisc) #estatistica da correlação





#___________________________________________________________________________ 2 curva


# Criar a conexão
mydb <- dbConnect(MySQL(), user = "root", password = "", dbname = "dory", host = "localhost")

# Verificar se a conexão foi estabelecida 
dbListTables(mydb)


# Executando uma consulta SELECT simples aqui muda a tabela
resultado <- dbGetQuery(mydb, "SELECT * FROM amostras")

# Visualizando os resultados
head(resultado)
# Acessando a última linha e criando um novo dataframe
resultado <- resultado[nrow(resultado), ]

# Visualizando o novo dataframe
print(resultado)
#arrumar tabela ................................................

# Utilizando pivot_longer para transformar os dados
raposa <- pivot_longer(resultado,
                            cols = starts_with("leitura"),
                            names_to = "leitura_n",
                            values_to = "valor")

# Visualizando o resultado
print(raposa)
attach(raposa)
str(raposa) # para ver a estrutura dos dados
#_________________________________________________________________________________________

#calculo Dori
# Calculando a média da coluna "valor" (substitua "valor" pelo nome correto da sua coluna)
ABS_media <- mean(valor, na.rm = TRUE)

ABS_media


# Calculando o desvio padrão da coluna "valor"
desvio <- sd(valor, na.rm = TRUE)

desvio

# Imprimindo os resultados
print(paste("A média da coluna valor é:", ABS_media))
print(paste("O desvio padrão da coluna valor é:", desvio))

#equação y= 0,183x + 0,0153
a= 0.2046
b= 0.0382

concentracao=(ABS_media-b)/a
print("concentração:")
concentracao = round(concentracao, digits = 4)
str(concentracao)
print("desvio:")
desvio = round(desvio, digits = 4)
str(desvio)




#---------------------------------------------
# Query e inserção

 # Criar a query SQL (ajuste de acordo com a estrutura da sua tabela)
 query <- paste0("UPDATE amostras SET concentracao = ", concentracao, ", desvio = ", desvio,
                " WHERE id_reservatorio = ", id_reservatorio)

 # Executar a query

dbSendQuery(mydb, query)

#----------------------------------------------------

# Verificando o resultado
resultado <- dbGetQuery(mydb, "SELECT * FROM amostras")
resultado

#________________________________________________________________________________________
