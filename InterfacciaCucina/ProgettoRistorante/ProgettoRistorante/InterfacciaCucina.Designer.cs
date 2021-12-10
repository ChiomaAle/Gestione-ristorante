namespace ProgettoRistorante {
    partial class Form1 {
        /// <summary>
        /// Variabile di progettazione necessaria.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Pulire le risorse in uso.
        /// </summary>
        /// <param name="disposing">ha valore true se le risorse gestite devono essere eliminate, false in caso contrario.</param>
        protected override void Dispose(bool disposing) {
            if (disposing && (components != null)) {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Codice generato da Progettazione Windows Form

        /// <summary>
        /// Metodo necessario per il supporto della finestra di progettazione. Non modificare
        /// il contenuto del metodo con l'editor di codice.
        /// </summary>
        private void InitializeComponent() {
            this.closeBtn = new System.Windows.Forms.Button();
            this.panel1 = new System.Windows.Forms.Panel();
            this.label1 = new System.Windows.Forms.Label();
            this.panel2 = new System.Windows.Forms.Panel();
            this.label3 = new System.Windows.Forms.Label();
            this.label2 = new System.Windows.Forms.Label();
            this.listaOrdinazioni = new System.Windows.Forms.FlowLayoutPanel();
            this.updateBtn = new System.Windows.Forms.Button();
            this.tavoloSelLabel = new System.Windows.Forms.Label();
            this.tempoAttesaBox = new System.Windows.Forms.NumericUpDown();
            this.inviaTempoAttesaBtn = new System.Windows.Forms.Button();
            this.panel1.SuspendLayout();
            this.panel2.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.tempoAttesaBox)).BeginInit();
            this.SuspendLayout();
            // 
            // closeBtn
            // 
            this.closeBtn.BackColor = System.Drawing.Color.FromArgb(((int)(((byte)(60)))), ((int)(((byte)(122)))), ((int)(((byte)(137)))));
            this.closeBtn.FlatStyle = System.Windows.Forms.FlatStyle.Flat;
            this.closeBtn.Location = new System.Drawing.Point(1084, 3);
            this.closeBtn.Name = "closeBtn";
            this.closeBtn.Size = new System.Drawing.Size(75, 42);
            this.closeBtn.TabIndex = 0;
            this.closeBtn.Text = "Chiudi";
            this.closeBtn.UseVisualStyleBackColor = false;
            this.closeBtn.Click += new System.EventHandler(this.closeBtn_Click);
            // 
            // panel1
            // 
            this.panel1.Controls.Add(this.label1);
            this.panel1.Location = new System.Drawing.Point(4, 3);
            this.panel1.Name = "panel1";
            this.panel1.Size = new System.Drawing.Size(1074, 42);
            this.panel1.TabIndex = 1;
            this.panel1.MouseDown += new System.Windows.Forms.MouseEventHandler(this.panel1_MouseDown);
            this.panel1.MouseMove += new System.Windows.Forms.MouseEventHandler(this.panel1_MouseMove);
            this.panel1.MouseUp += new System.Windows.Forms.MouseEventHandler(this.panel1_MouseUp);
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.Font = new System.Drawing.Font("Arial", 24F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label1.ForeColor = System.Drawing.Color.FromArgb(((int)(((byte)(255)))), ((int)(((byte)(190)))), ((int)(((byte)(11)))));
            this.label1.Location = new System.Drawing.Point(3, 3);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(263, 36);
            this.label1.TabIndex = 2;
            this.label1.Text = "Interfaccia cucina";
            // 
            // panel2
            // 
            this.panel2.Controls.Add(this.label3);
            this.panel2.Controls.Add(this.label2);
            this.panel2.Location = new System.Drawing.Point(13, 620);
            this.panel2.Name = "panel2";
            this.panel2.Size = new System.Drawing.Size(282, 60);
            this.panel2.TabIndex = 2;
            // 
            // label3
            // 
            this.label3.AutoSize = true;
            this.label3.Font = new System.Drawing.Font("Arial", 24F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label3.ForeColor = System.Drawing.Color.Lime;
            this.label3.Location = new System.Drawing.Point(110, 14);
            this.label3.Name = "label3";
            this.label3.Size = new System.Drawing.Size(156, 36);
            this.label3.TabIndex = 4;
            this.label3.Text = "In servizio";
            this.label3.Click += new System.EventHandler(this.label3_Click);
            // 
            // label2
            // 
            this.label2.AutoSize = true;
            this.label2.Font = new System.Drawing.Font("Arial", 24F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label2.ForeColor = System.Drawing.Color.FromArgb(((int)(((byte)(255)))), ((int)(((byte)(190)))), ((int)(((byte)(11)))));
            this.label2.Location = new System.Drawing.Point(7, 14);
            this.label2.Name = "label2";
            this.label2.Size = new System.Drawing.Size(97, 36);
            this.label2.TabIndex = 3;
            this.label2.Text = "Stato:";
            this.label2.Click += new System.EventHandler(this.label2_Click);
            // 
            // listaOrdinazioni
            // 
            this.listaOrdinazioni.AutoScroll = true;
            this.listaOrdinazioni.Location = new System.Drawing.Point(12, 51);
            this.listaOrdinazioni.Name = "listaOrdinazioni";
            this.listaOrdinazioni.Size = new System.Drawing.Size(1137, 563);
            this.listaOrdinazioni.TabIndex = 3;
            this.listaOrdinazioni.WrapContents = false;
            this.listaOrdinazioni.MouseUp += new System.Windows.Forms.MouseEventHandler(this.listaOrdinazioni_MouseUp);
            // 
            // updateBtn
            // 
            this.updateBtn.BackColor = System.Drawing.Color.FromArgb(((int)(((byte)(60)))), ((int)(((byte)(122)))), ((int)(((byte)(137)))));
            this.updateBtn.FlatStyle = System.Windows.Forms.FlatStyle.Flat;
            this.updateBtn.Location = new System.Drawing.Point(301, 628);
            this.updateBtn.Name = "updateBtn";
            this.updateBtn.Size = new System.Drawing.Size(75, 42);
            this.updateBtn.TabIndex = 4;
            this.updateBtn.Text = "Aggiorna";
            this.updateBtn.UseVisualStyleBackColor = false;
            this.updateBtn.Click += new System.EventHandler(this.updateBtn_Click);
            // 
            // tavoloSelLabel
            // 
            this.tavoloSelLabel.AutoSize = true;
            this.tavoloSelLabel.Font = new System.Drawing.Font("Arial", 24F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.tavoloSelLabel.ForeColor = System.Drawing.Color.FromArgb(((int)(((byte)(255)))), ((int)(((byte)(190)))), ((int)(((byte)(11)))));
            this.tavoloSelLabel.Location = new System.Drawing.Point(643, 634);
            this.tavoloSelLabel.Name = "tavoloSelLabel";
            this.tavoloSelLabel.Size = new System.Drawing.Size(329, 36);
            this.tavoloSelLabel.TabIndex = 5;
            this.tavoloSelLabel.Text = "Tempo attesa tavolo: 1";
            this.tavoloSelLabel.Visible = false;
            // 
            // tempoAttesaBox
            // 
            this.tempoAttesaBox.BackColor = System.Drawing.Color.FromArgb(((int)(((byte)(60)))), ((int)(((byte)(122)))), ((int)(((byte)(137)))));
            this.tempoAttesaBox.BorderStyle = System.Windows.Forms.BorderStyle.None;
            this.tempoAttesaBox.Font = new System.Drawing.Font("Arial", 11.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.tempoAttesaBox.ForeColor = System.Drawing.Color.White;
            this.tempoAttesaBox.Location = new System.Drawing.Point(989, 641);
            this.tempoAttesaBox.Name = "tempoAttesaBox";
            this.tempoAttesaBox.Size = new System.Drawing.Size(65, 21);
            this.tempoAttesaBox.TabIndex = 6;
            this.tempoAttesaBox.Visible = false;
            // 
            // inviaTempoAttesaBtn
            // 
            this.inviaTempoAttesaBtn.BackColor = System.Drawing.Color.FromArgb(((int)(((byte)(60)))), ((int)(((byte)(122)))), ((int)(((byte)(137)))));
            this.inviaTempoAttesaBtn.FlatStyle = System.Windows.Forms.FlatStyle.Flat;
            this.inviaTempoAttesaBtn.Location = new System.Drawing.Point(1074, 634);
            this.inviaTempoAttesaBtn.Name = "inviaTempoAttesaBtn";
            this.inviaTempoAttesaBtn.Size = new System.Drawing.Size(50, 36);
            this.inviaTempoAttesaBtn.TabIndex = 7;
            this.inviaTempoAttesaBtn.Text = "Invia";
            this.inviaTempoAttesaBtn.UseVisualStyleBackColor = false;
            this.inviaTempoAttesaBtn.Visible = false;
            this.inviaTempoAttesaBtn.Click += new System.EventHandler(this.button1_Click);
            // 
            // Form1
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.BackColor = System.Drawing.Color.FromArgb(((int)(((byte)(22)))), ((int)(((byte)(38)))), ((int)(((byte)(46)))));
            this.ClientSize = new System.Drawing.Size(1161, 692);
            this.Controls.Add(this.inviaTempoAttesaBtn);
            this.Controls.Add(this.tempoAttesaBox);
            this.Controls.Add(this.tavoloSelLabel);
            this.Controls.Add(this.updateBtn);
            this.Controls.Add(this.listaOrdinazioni);
            this.Controls.Add(this.panel2);
            this.Controls.Add(this.panel1);
            this.Controls.Add(this.closeBtn);
            this.FormBorderStyle = System.Windows.Forms.FormBorderStyle.None;
            this.Name = "Form1";
            this.Text = "Interfaccia cucina";
            this.panel1.ResumeLayout(false);
            this.panel1.PerformLayout();
            this.panel2.ResumeLayout(false);
            this.panel2.PerformLayout();
            ((System.ComponentModel.ISupportInitialize)(this.tempoAttesaBox)).EndInit();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.Button closeBtn;
        private System.Windows.Forms.Panel panel1;
        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.Panel panel2;
        private System.Windows.Forms.Label label2;
        private System.Windows.Forms.Label label3;
        private System.Windows.Forms.FlowLayoutPanel listaOrdinazioni;
        private System.Windows.Forms.Button updateBtn;
        private System.Windows.Forms.Label tavoloSelLabel;
        private System.Windows.Forms.NumericUpDown tempoAttesaBox;
        private System.Windows.Forms.Button inviaTempoAttesaBtn;
    }
}

