library(shiny)

# Definindo a interface do usuário
ui <- fluidPage(
  titlePanel("Executar Script R"),
  sidebarLayout(
    sidebarPanel(
      actionButton("runScript", "Executar Script")
    ),
    mainPanel(
      verbatimTextOutput("scriptOutput")
    )
  )
)

# Definindo o servidor
server <- function(input, output) {
  observeEvent(input$runScript, {
    # Executando o script R
    result <- capture.output({
      source("R_amostra_dori.R")
    })
    
    output$scriptOutput <- renderText({
      paste(result, collapse = "\n")
    })
  })
}

# Executando o aplicativo Shiny
shinyApp(ui = ui, server = server)
